<?php

namespace InsightMedia\StatamicOpeningHours\Tags;

use DateTime;
use InsightMedia\StatamicOpeningHours\Facades\OpeningHoursStorage;
use Spatie\OpeningHours\OpeningHours;
use Spatie\OpeningHours\OpeningHoursForDay;
use Statamic\Tags\Tags;
use Statamic\Facades\Site;

class OpeningHoursTag extends Tags
{

    /**
     * The {{ openingHours }} tag.
     */

    protected static $handle = 'openingHours';

    protected ?array $data = null;

    private array $weekDayNames = ['monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday', 'sunday'];

    public function isOpenNow(): bool
    {

        return $this->openingHours()->isOpenAt(new DateTime());

    }

    public function isClosedNow(): bool
    {

        return $this->openingHours()->isClosedAt(new DateTime());

    }

    public function isOpenOn(): bool
    {

        return $this->openingHours()->isOpenOn($this->params->get('day'));

    }

    public function isOpenAt(): bool
    {

        return $this->openingHours()->isOpenAt(new DateTime($this->params->get('date')));

    }

    public function isClosedOn(): bool
    {

        return $this->openingHours()->isClosedOn($this->params->get('day'));

    }

    public function isClosedAt(): bool
    {

        return $this->openingHours()->isClosedAt(new DateTime($this->params->get('date')));

    }

    public function forDay(): array
    {

        return $this->openingHours()->forDay($this->params->get('day'))->map(function($item) {
            return [
                "from" => $item->start()->format($this->params->get('format')),
                "to" => $item->end()->format($this->params->get('format'))
            ];
        });

    }

    public function forWeek(): array
    {

        $days = [];

        foreach ($this->openingHours()->forWeek() as $day => $openingHours) {
            if (!$openingHours->isEmpty()) {
                $item = [
                    "day" => $day,
                    "hours" => $openingHours->map(function($item) {
                        return [
                            "from" => $item->start()->format($this->params->get('format')),
                            "to" => $item->end()->format($this->params->get('format'))
                        ];
                    })
                ];
                $days[] = $item;
            }
        }

        return $days;

    }

    public function forDate(): array
    {

        return $this->openingHours()->forDate(new DateTime($this->params->get('date')))->map(function($item) {
            return [
                "from" => $item->start()->format($this->params->get('format')),
                "to" => $item->end()->format($this->params->get('format'))
            ];
        });

    }

    public function nextOpen(): string
    {

        return $this->openingHours()->nextOpen(new DateTime($this->params->get('date')))->format($this->params->get('format'));

    }

    public function nextClose(): string
    {

        return $this->openingHours()->nextClose(new DateTime($this->params->get('date')))->format($this->params->get('format'));

    }

    public function previousOpen(): string
    {

        return $this->openingHours()->previousOpen(new DateTime($this->params->get('date')))->format($this->params->get('format'));

    }

    protected function getData(): array
    {

        return OpeningHoursStorage::getYaml('settings', Site::selected());

    }

    protected function openingHours(): OpeningHours
    {

        if ($this->data) {
            $data = $this->data;
        }
        else {
            $data = $this->filter($this->getData());

            foreach ($this->weekDayNames as $weekDayName) {
                $data[$weekDayName] = $this->mapWeekday($data[$weekDayName]);
            }

            $data['exceptions'] = $this->mapExceptions($data['exceptions']);

            $this->data = $data;
        }

        return OpeningHours::create($data);

    }

    protected function filter(array $data): array
    {

        $allowedKeys = array_merge($this->weekDayNames, ['exceptions']);

        return array_filter(
            $data,
            function ($key) use ($allowedKeys) {
                return in_array($key, $allowedKeys);
            },
            ARRAY_FILTER_USE_KEY
        );

    }

    protected function mapWeekday(array $weekDay): array
    {

        return array_map(fn($day): string => sprintf("%s-%s", $day['from'], $day['to']), $weekDay);

    }

    protected function mapExceptions(array $exceptions): array
    {

        $data = [];

        foreach ($exceptions as $exception) {
            $data[$exception['date']] = [];
        }

        return $data;

    }

}
