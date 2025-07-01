<?php

namespace InsightMedia\StatamicOpeningHours\Tags;

use DateTimeInterface;
use Illuminate\Support\Facades\Date;
use InsightMedia\StatamicOpeningHours\Facades\OpeningHoursStorage;
use InsightMedia\StatamicOpeningHours\Parser;
use Spatie\OpeningHours\OpeningHours;
use Statamic\Tags\Tags;
use Statamic\Facades\Site;

class OpeningHoursTag extends Tags
{

    /**
     * The {{ openingHours }} tag.
     */

    protected static $handle = 'openingHours';

    protected ?array $data = null;

    public function isOpen(): bool
    {

        if ($at = $this->params->get('at')) {
            // {{ openingHours:isOpen at="2022-12-31 15:00:00" }}
            return $this->openingHours()->isOpenAt(Date::parse($at));
        } elseif ($on = $this->params->get('on')) {
            // {{ openingHours:isOpen on="2022-12-31" }}
            // {{ openingHours:isOpen on="monday" }}
            return $this->openingHours()->isOpenOn(Date::parse($on));
        } else {
            // {{ openingHours:isOpen }}
            return $this->openingHours()->isOpenAt(Date::now());
        }

    }

    public function isClosed(): bool
    {

        if ($at = $this->params->get('at')) {
            // {{ openingHours:isClosed at="2022-12-31 15:00:00" }}
            return $this->openingHours()->isClosedAt(Date::parse($at));
        } elseif ($on = $this->params->get('on')) {
            // {{ openingHours:isClosed on="2022-12-31" }}
            // {{ openingHours:isClosed on="monday" }}
            return $this->openingHours()->isClosedOn(Date::parse($on));
        } else {
            // {{ openingHours:isClosed }}
            return $this->openingHours()->isClosedAt(Date::now());
        }

    }

    public function forDay(): array
    {
        $day = $this->params->get('day');

        return $this->openingHours()->forDay($day)
            ->map(fn ($item) => [
                "from" => $item->start()->toDateTime(Date::make($day)),
                "to" => $item->end()->toDateTime(Date::make($day)),
            ]);
    }

    public function forWeek(): iterable
    {
        return collect($this->openingHours()->forWeek())
            ->filter(fn ($hours) => !$hours->isEmpty())
            ->map(fn ($hours, $day) => [
                "day" => $date = Date::make($day),
                "hours" => $hours->map(fn ($item) => [
                    "from" => $item->start()->toDateTime($date),
                    "to" => $item->end()->toDateTime($date),
                ])
            ])
            ->values();
    }

    public function forWeekCombined(): iterable
    {
        return collect($this->openingHours()->forWeekCombined())
            ->filter(fn ($group) => !$group['opening_hours']->isEmpty())
            ->map(fn ($group) => [
                "day" => count($group['days']) === 1 ? Date::make(collect($group['days'])->first()) : null,
                "days" => count($group['days']) > 1 ? [
                    "first" => Date::make(collect($group['days'])->first()),
                    "last" => Date::make(collect($group['days'])->last()),
                ] : null,
                "hours" => $group['opening_hours']->map(fn ($item) => [
                    "from" => $item->start()->toDateTime(Date::now()),
                    "to" => $item->end()->toDateTime(Date::now()),
                ])
            ])
            ->values();
    }

    public function forDate(): array
    {
        $date = $this->params->get('date');

        return $this->openingHours()->forDate(Date::make($date))
            ->map(fn ($item) => [
                "from" => $item->start()->toDateTime(Date::make($date)),
                "to" => $item->end()->toDateTime(Date::make($date)),
            ]);
    }

    public function nextOpen(): string
    {

        return $this->format($this->openingHours()->nextOpen(Date::parse($this->params->get('date'))), $this->params->get('format'));

    }

    public function nextClose(): string
    {

        return $this->format($this->openingHours()->nextClose(Date::parse($this->params->get('date'))), $this->params->get('format'));

    }

    public function previousOpen(): string
    {

        return $this->format($this->openingHours()->previousOpen(Date::parse($this->params->get('date'))), $this->params->get('format'));

    }

    public function exceptions(): array
    {

        $exceptions = [];

        foreach ($this->openingHours()->exceptions() as $day => $openingHours) {
            $item["day"] = $day;
            $item["reason"] = $openingHours->data;

            if (!$openingHours->isEmpty()) {
                $item["hours"] = $openingHours->map(function ($item) {
                    return [
                        "from" => $item->start()->format($this->params->get('format')),
                        "to" => $item->end()->format($this->params->get('format'))
                    ];
                });
            }
            else {
                $item["hours"] = [];
            }

            $exceptions[] = $item;
        }

        return $exceptions;

    }

    public function diffInOpenHours(): float
    {

        return $this->openingHours()->diffInOpenHours(Date::parse($this->params->get('from')), Date::parse($this->params->get('to')));

    }

    public function diffInOpenMinutes(): float
    {

        return $this->openingHours()->diffInOpenMinutes(Date::parse($this->params->get('from')), Date::parse($this->params->get('to')));

    }

    public function diffInOpenSeconds(): float
    {

        return $this->openingHours()->diffInOpenSeconds(Date::parse($this->params->get('from')), Date::parse($this->params->get('to')));

    }

    public function diffInClosedHours(): float
    {

        return $this->openingHours()->diffInClosedHours(Date::parse($this->params->get('from')), Date::parse($this->params->get('to')));

    }

    public function diffInClosedMinutes(): float
    {

        return $this->openingHours()->diffInClosedMinutes(Date::parse($this->params->get('from')), Date::parse($this->params->get('to')));

    }

    public function diffInClosedSeconds(): float
    {

        return $this->openingHours()->diffInClosedSeconds(Date::parse($this->params->get('from')), Date::parse($this->params->get('to')));

    }

    protected function getData(): array
    {

        return OpeningHoursStorage::getYaml(Site::selected());

    }

    protected function openingHours(): OpeningHours
    {

        if (!$this->data) {
            $this->data = (new Parser)->parse($this->getData());
        }

        return OpeningHours::create($this->data);

    }

    protected function format(DateTimeInterface $date, string $format): string
    {
        return Date::make($date)->translatedFormat($format);

    }

}
