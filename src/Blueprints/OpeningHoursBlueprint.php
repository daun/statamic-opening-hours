<?php

namespace InsightMedia\StatamicOpeningHours\Blueprints;

use Statamic\Facades\Blueprint;

class OpeningHoursBlueprint
{

    public static function get()
    {
        return Blueprint::make()->setContents([
            'sections' => [
                'main' => [
                    'fields' => [
                        [
                            'handle' => 'default_hours_title',
                            'field' => [
                                'type' => 'section',
                                'display' => __('statamic-opening-hours::opening-hours.default-hours.display'),
                                'instructions' => __('statamic-opening-hours::opening-hours.default-hours.instructions'),
                                'listable' => 'hidden',
                            ],
                        ],
                        [
                            'handle' => 'monday',
                            'field' => [
                                'fields' => [
                                    [
                                        'handle' => 'from',
                                        'field' => [
                                            'seconds_enabled' => false,
                                            'display' => __('statamic-opening-hours::opening-hours.from'),
                                            'type' => 'time',
                                            'icon' => 'time',
                                            'width' => 50,
                                            'listable' => 'hidden',
                                            'instructions_position' => 'above',
                                            'visibility' => 'visible',
                                            'always_save' => false,
                                            'validate' => 'required'
                                        ]
                                    ],
                                    [
                                        'handle' => 'to',
                                        'field' => [
                                            'seconds_enabled' => false,
                                            'display' => __('statamic-opening-hours::opening-hours.to'),
                                            'type' => 'time',
                                            'icon' => 'time',
                                            'width' => 50,
                                            'listable' => 'hidden',
                                            'instructions_position' => 'above',
                                            'visibility' => 'visible',
                                            'always_save' => false,
                                            'validate' => 'required'
                                        ]
                                    ]
                                ],
                                'mode' => 'table',
                                'add_row' => __('statamic-opening-hours::opening-hours.add-hours'),
                                'reorderable' => true,
                                'display' => __('statamic-opening-hours::opening-hours.weekdays.monday'),
                                'type' => 'grid',
                                'icon' => 'grid',
                                'listable' => 'hidden',
                                'instructions_position' => 'above',
                                'visibility' => 'visible',
                                'always_save' => false
                            ]
                        ],
                        [
                            'handle' => 'tuesday',
                            'field' => [
                                'fields' => [
                                    [
                                        'handle' => 'from',
                                        'field' => [
                                            'seconds_enabled' => false,
                                            'display' => __('statamic-opening-hours::opening-hours.from'),
                                            'type' => 'time',
                                            'icon' => 'time',
                                            'width' => 50,
                                            'listable' => 'hidden',
                                            'instructions_position' => 'above',
                                            'visibility' => 'visible',
                                            'always_save' => false,
                                            'validate' => 'required'
                                        ]
                                    ],
                                    [
                                        'handle' => 'to',
                                        'field' => [
                                            'seconds_enabled' => false,
                                            'display' => __('statamic-opening-hours::opening-hours.to'),
                                            'type' => 'time',
                                            'icon' => 'time',
                                            'width' => 50,
                                            'listable' => 'hidden',
                                            'instructions_position' => 'above',
                                            'visibility' => 'visible',
                                            'always_save' => false,
                                            'validate' => 'required'
                                        ]
                                    ]
                                ],
                                'mode' => 'table',
                                'add_row' => __('statamic-opening-hours::opening-hours.add-hours'),
                                'reorderable' => true,
                                'display' => __('statamic-opening-hours::opening-hours.weekdays.tuesday'),
                                'type' => 'grid',
                                'icon' => 'grid',
                                'listable' => 'hidden',
                                'instructions_position' => 'above',
                                'visibility' => 'visible',
                                'always_save' => false
                            ]
                        ],
                        [
                            'handle' => 'wednesday',
                            'field' => [
                                'fields' => [
                                    [
                                        'handle' => 'from',
                                        'field' => [
                                            'seconds_enabled' => false,
                                            'display' => __('statamic-opening-hours::opening-hours.from'),
                                            'type' => 'time',
                                            'icon' => 'time',
                                            'width' => 50,
                                            'listable' => 'hidden',
                                            'instructions_position' => 'above',
                                            'visibility' => 'visible',
                                            'always_save' => false,
                                            'validate' => 'required'
                                        ]
                                    ],
                                    [
                                        'handle' => 'to',
                                        'field' => [
                                            'seconds_enabled' => false,
                                            'display' => __('statamic-opening-hours::opening-hours.to'),
                                            'type' => 'time',
                                            'icon' => 'time',
                                            'width' => 50,
                                            'listable' => 'hidden',
                                            'instructions_position' => 'above',
                                            'visibility' => 'visible',
                                            'always_save' => false,
                                            'validate' => 'required'
                                        ]
                                    ]
                                ],
                                'mode' => 'table',
                                'add_row' => __('statamic-opening-hours::opening-hours.add-hours'),
                                'reorderable' => true,
                                'display' => __('statamic-opening-hours::opening-hours.weekdays.wednesday'),
                                'type' => 'grid',
                                'icon' => 'grid',
                                'listable' => 'hidden',
                                'instructions_position' => 'above',
                                'visibility' => 'visible',
                                'always_save' => false
                            ]
                        ],
                        [
                            'handle' => 'thursday',
                            'field' => [
                                'fields' => [
                                    [
                                        'handle' => 'from',
                                        'field' => [
                                            'seconds_enabled' => false,
                                            'display' => __('statamic-opening-hours::opening-hours.from'),
                                            'type' => 'time',
                                            'icon' => 'time',
                                            'width' => 50,
                                            'listable' => 'hidden',
                                            'instructions_position' => 'above',
                                            'visibility' => 'visible',
                                            'always_save' => false,
                                            'validate' => 'required'
                                        ]
                                    ],
                                    [
                                        'handle' => 'to',
                                        'field' => [
                                            'seconds_enabled' => false,
                                            'display' => __('statamic-opening-hours::opening-hours.to'),
                                            'type' => 'time',
                                            'icon' => 'time',
                                            'width' => 50,
                                            'listable' => 'hidden',
                                            'instructions_position' => 'above',
                                            'visibility' => 'visible',
                                            'always_save' => false,
                                            'validate' => 'required'
                                        ]
                                    ]
                                ],
                                'mode' => 'table',
                                'add_row' => __('statamic-opening-hours::opening-hours.add-hours'),
                                'reorderable' => true,
                                'display' => __('statamic-opening-hours::opening-hours.weekdays.thursday'),
                                'type' => 'grid',
                                'icon' => 'grid',
                                'listable' => 'hidden',
                                'instructions_position' => 'above',
                                'visibility' => 'visible',
                                'always_save' => false
                            ]
                        ],
                        [
                            'handle' => 'friday',
                            'field' => [
                                'fields' => [
                                    [
                                        'handle' => 'from',
                                        'field' => [
                                            'seconds_enabled' => false,
                                            'display' => __('statamic-opening-hours::opening-hours.from'),
                                            'type' => 'time',
                                            'icon' => 'time',
                                            'width' => 50,
                                            'listable' => 'hidden',
                                            'instructions_position' => 'above',
                                            'visibility' => 'visible',
                                            'always_save' => false,
                                            'validate' => 'required'
                                        ]
                                    ],
                                    [
                                        'handle' => 'to',
                                        'field' => [
                                            'seconds_enabled' => false,
                                            'display' => __('statamic-opening-hours::opening-hours.to'),
                                            'type' => 'time',
                                            'icon' => 'time',
                                            'width' => 50,
                                            'listable' => 'hidden',
                                            'instructions_position' => 'above',
                                            'visibility' => 'visible',
                                            'always_save' => false,
                                            'validate' => 'required'
                                        ]
                                    ]
                                ],
                                'mode' => 'table',
                                'add_row' => __('statamic-opening-hours::opening-hours.add-hours'),
                                'reorderable' => true,
                                'display' => __('statamic-opening-hours::opening-hours.weekdays.friday'),
                                'type' => 'grid',
                                'icon' => 'grid',
                                'listable' => 'hidden',
                                'instructions_position' => 'above',
                                'visibility' => 'visible',
                                'always_save' => false
                            ]
                        ],
                        [
                            'handle' => 'saturday',
                            'field' => [
                                'fields' => [
                                    [
                                        'handle' => 'from',
                                        'field' => [
                                            'seconds_enabled' => false,
                                            'display' => __('statamic-opening-hours::opening-hours.from'),
                                            'type' => 'time',
                                            'icon' => 'time',
                                            'width' => 50,
                                            'listable' => 'hidden',
                                            'instructions_position' => 'above',
                                            'visibility' => 'visible',
                                            'always_save' => false,
                                            'validate' => 'required'
                                        ]
                                    ],
                                    [
                                        'handle' => 'to',
                                        'field' => [
                                            'seconds_enabled' => false,
                                            'display' => __('statamic-opening-hours::opening-hours.to'),
                                            'type' => 'time',
                                            'icon' => 'time',
                                            'width' => 50,
                                            'listable' => 'hidden',
                                            'instructions_position' => 'above',
                                            'visibility' => 'visible',
                                            'always_save' => false,
                                            'validate' => 'required'
                                        ]
                                    ]
                                ],
                                'mode' => 'table',
                                'add_row' => __('statamic-opening-hours::opening-hours.add-hours'),
                                'reorderable' => true,
                                'display' => __('statamic-opening-hours::opening-hours.weekdays.saturday'),
                                'type' => 'grid',
                                'icon' => 'grid',
                                'listable' => 'hidden',
                                'instructions_position' => 'above',
                                'visibility' => 'visible',
                                'always_save' => false
                            ]
                        ],
                        [
                            'handle' => 'sunday',
                            'field' => [
                                'fields' => [
                                    [
                                        'handle' => 'from',
                                        'field' => [
                                            'seconds_enabled' => false,
                                            'display' => __('statamic-opening-hours::opening-hours.from'),
                                            'type' => 'time',
                                            'icon' => 'time',
                                            'width' => 50,
                                            'listable' => 'hidden',
                                            'instructions_position' => 'above',
                                            'visibility' => 'visible',
                                            'always_save' => false,
                                            'validate' => 'required'
                                        ]
                                    ],
                                    [
                                        'handle' => 'to',
                                        'field' => [
                                            'seconds_enabled' => false,
                                            'display' => __('statamic-opening-hours::opening-hours.to'),
                                            'type' => 'time',
                                            'icon' => 'time',
                                            'width' => 50,
                                            'listable' => 'hidden',
                                            'instructions_position' => 'above',
                                            'visibility' => 'visible',
                                            'always_save' => false,
                                            'validate' => 'required'
                                        ]
                                    ]
                                ],
                                'mode' => 'table',
                                'add_row' => __('statamic-opening-hours::opening-hours.add-hours'),
                                'reorderable' => true,
                                'display' => __('statamic-opening-hours::opening-hours.weekdays.sunday'),
                                'type' => 'grid',
                                'icon' => 'grid',
                                'listable' => 'hidden',
                                'instructions_position' => 'above',
                                'visibility' => 'visible',
                                'always_save' => false
                            ]
                        ],
                        [
                            'handle' => 'exceptions',
                            'field' => [
                                'collapse' => false,
                                'previews' => true,
                                'sets' => [
                                    'exception' => [
                                        'display' => __('statamic-opening-hours::opening-hours.exceptions.set_title'),
                                        'fields' => [
                                            [
                                                'handle' => 'date',
                                                'field' => [
                                                    'mode' => 'single',
                                                    'time_enabled' => false,
                                                    'time_seconds_enabled' => false,
                                                    'full_width' => false,
                                                    'inline' => false,
                                                    'columns' => 1,
                                                    'rows' => 1,
                                                    'display' => __('statamic-opening-hours::opening-hours.exceptions.closing_date'),
                                                    'type' => 'date',
                                                    'icon' => 'date',
                                                    'width' => 50,
                                                    'listable' => 'hidden',
                                                    'instructions_position' => 'above',
                                                    'visibility' => 'visible',
                                                    'always_save' => false,
                                                    'validate' => 'required'
                                                ],
                                            ],
                                            [
                                                'handle' => 'reason',
                                                'field' => [
                                                    'input_type' => 'text',
                                                    'antlers' => false,
                                                    'display' => __('statamic-opening-hours::opening-hours.exceptions.reason'),
                                                    'type' => 'text',
                                                    'icon' => 'text',
                                                    'width' => 50,
                                                    'listable' => 'hidden',
                                                    'instructions_position' => 'above',
                                                    'visibility' => 'visible',
                                                    'always_save' => false,
                                                ],
                                            ],
                                            [
                                                'handle' => 'hours',
                                                'field' => [
                                                    'fields' => [
                                                        [
                                                            'handle' => 'from',
                                                            'field' => [
                                                                'seconds_enabled' => false,
                                                                'display' => __('statamic-opening-hours::opening-hours.from'),
                                                                'type' => 'time',
                                                                'icon' => 'time',
                                                                'width' => 50,
                                                                'listable' => 'hidden',
                                                                'instructions_position' => 'above',
                                                                'visibility' => 'visible',
                                                                'always_save' => false,
                                                                'validate' => 'required'
                                                            ],
                                                        ],
                                                        [
                                                            'handle' => 'to',
                                                            'field' => [
                                                                'seconds_enabled' => false,
                                                                'display' => __('statamic-opening-hours::opening-hours.to'),
                                                                'type' => 'time',
                                                                'icon' => 'time',
                                                                'width' => 50,
                                                                'listable' => 'hidden',
                                                                'instructions_position' => 'above',
                                                                'visibility' => 'visible',
                                                                'always_save' => false,
                                                                'validate' => 'required'
                                                            ],
                                                        ],
                                                    ],
                                                    'mode' => 'table',
                                                    'add_row' => __('statamic-opening-hours::opening-hours.add-hours'),
                                                    'reorderable' => true,
                                                    'display' => __('statamic-opening-hours::opening-hours.exceptions.exceptional_hours'),
                                                    'type' => 'grid',
                                                    'icon' => 'grid',
                                                    'listable' => 'hidden',
                                                    'instructions_position' => 'above',
                                                    'visibility' => 'visible',
                                                    'always_save' => false,
                                                    'instructions' => __('statamic-opening-hours::opening-hours.exceptions.exceptional_hours_display'),
                                                ],
                                            ],
                                        ],
                                    ],
                                ],
                                'display' => __('statamic-opening-hours::opening-hours.exceptions.display'),
                                'type' => 'replicator',
                                'icon' => 'replicator',
                                'instructions' => __('statamic-opening-hours::opening-hours.exceptions.instructions'),
                                'listable' => 'hidden',
                                'instructions_position' => 'above',
                                'visibility' => 'visible',
                                'always_save' => false,
                            ],
                        ]
                    ]
                ],
            ],
        ]);
    }
}
