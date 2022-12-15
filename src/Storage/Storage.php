<?php

namespace InsightMedia\StatamicOpeningHours\Storage;

use Illuminate\Support\Collection;
use Statamic\Sites\Site as SiteObject;
use Statamic\Facades\File;
use Statamic\Facades\Site;
use Statamic\Facades\YAML;

class Storage
{
    const prefix = 'opening-hours';

    /**
     * Retrieve YAML data from storage
     */
    public static function getYaml(string $handle, SiteObject $site, bool $returnCollection = false): array
    {
        $path = storage_path(implode('/', [
            'statamic/addons/opening-hours',
            self::prefix . '_' . "{$handle}.yaml",
        ]));

        $data = YAML::parse(File::get($path));

        $site_data = collect($data)->get($site->handle());

        if ($returnCollection) {
            return collect($site_data);
        }

        return collect($site_data)->toArray() ?: [];
    }

    /**
     * Put YAML data into storage
     */
    public static function putYaml(string $handle, SiteObject $site, array $data): void
    {
        $path = storage_path(implode('/', [
            'statamic/addons/opening-hours',
            self::prefix . '_' . "{$handle}.yaml",
        ]));

        $existing = collect(YAML::parse(File::get($path)));

        $combined_data = $existing->merge([
            "{$site->handle()}" => $data,
        ]);

        File::put($path, YAML::dump($combined_data->toArray()));
    }
}
