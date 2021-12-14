<div id="contact" class="c-contact-banner u-print-display--none">

    @if(!$hideContentArea || (!$hideTitle && !empty($post_title)))
        <div class="c-contact-banner__info-container">
            <div class="c-contact-banner__content">
                @if (!$hideTitle && !empty($post_title))
                    @typography([
                        "element" => "h2",
                        "classList" => [
                            "c-contact-banner__title"
                        ]
                    ])
                        {!! apply_filters('the_title', $post_title) !!}
                    @endtypography
                @endif


            @if(!$hideMainContent && !empty($mainContent))
                @typography([
                    "element" => "p",
                    "classList" => [
                        "c-contact-banner__text"
                    ]
                ])
                    {!! $mainContent !!}
                @endtypography
            @endif

            </div>

            @if(!$hideBusinessHours && !empty($headerBusinessHours))
            
                <div class="c-contact-banner__hours">

                    <!-- Header for business hours -->
                    @typography([
                        "element" => "h4",
                        "classList" => [
                            "c-contact-banner__hours-title"
                        ]
                    ])
                        {!! $headerBusinessHours !!}
                    @endtypography

                    <!-- Time & date list -->
                    @if($openHours)
                        @foreach ($openHours as $openHour)
                            @typography([
                                "element" => "p"
                            ])
                                {!! $openHour !!}
                            @endtypography 
                        @endforeach
                    @endif

                    <!-- Abnormal link message --> 
                    @if($abnormalHours)
                        @link([
                            'href' => $abnormalHours['link'], 
                            'keepContent' => true
                        ])
                            @typography([
                                    "element" => "p",
                                    "classList" => [
                                        "c-contact-banner__abnormal-hours"
                                    ]
                                ])
                                    {!! $abnormalHours['text'] !!}
                            @endtypography
                        @endlink
                    @endif

                </div>
            @endif
        </div>
    @endif

    @if(isset($ctaList) && !empty($ctaList))
        @paper([])
            @group(['classList' => []])
                @foreach ($ctaList as $index => $listItem)
                    @card([
                        'classList' => [
                            'card-item-'.$index,
                            'u-box-shadow--0'
                        ],
                            'attributeList' => [
                            'aria-labelledby' => 'mod-contactbanner-' . $ID . '-' . $index
                        ],
                        'context' => 'contactbanner'
                    ])

                        <div class="c-card__header u-padding__x--4 u-padding__top--3 u-padding__bottom--1">
                            
                            @if($listItem->icon)
                                @icon([
                                    'icon' => $listItem->icon, 
                                    'size' => 'md',
                                    'color' => 'primary'
                                ])
                                @endicon
                            @endif
        
                            @typography([
                                'element' => 'h4',
                                'variant' => 'h3',
                                'id'      => 'mod-contactbanner-' . $ID . '-' . $index,
                                'classList' => ['u-margin__left--2']
                            ])
        
                            {{$listItem->title}}
                            @endtypography
                        </div>

                        <div class="c-card__body u-padding__x--4 u-padding__top--0 u-padding__bottom--3">
                            {!! $listItem->content !!}
                        </div>

                        @if($listItem->displayCta)
                            <div class="c-card__footer c-contact-banner__footer u-padding__x--4 u-padding__y--2">
                                @button([
                                    'text' => $listItem->label,
                                    'color' => 'default',
                                    'style' => 'basic',
                                    'icon' => 'arrow_forward',
                                    'href' => !empty($listItem->url) ? $listItem->url : '',
                                    'attributeList' => [
                                        'onclick' => !empty($listItem->onclick) ? 'action'.$index.'()' : ''
                                    ]
                                ])
                                @endbutton

                                @if (!empty($listItem->onclick))
                                <script>function action{!! $index !!}() {
                                    {!! $listItem->onclick !!}
                                }</script>
                                @endif
                            </div>
                        @endif
        
                    @endcard
                @endforeach
            @endgroup
        @endpaper
    @endif

</div>
