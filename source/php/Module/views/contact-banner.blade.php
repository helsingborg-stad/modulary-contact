<div id="contact" class="c-contact-banner u-print-display--none">

    @if(isset($ctaList) && !empty($ctaList))
        @group(['classList' => ['u-box-shadow--2']])
            @foreach ($ctaList as $index => $listItem)
                @card([
                    'classList' => [
                        'card-item-'.$index,
                    ],
                        'attributeList' => [
                        'aria-labelledby' => 'mod-contactbanner-' . $id
                    ],
                    'context' => 'contactbanner'
                ])

                    <div class="c-card__header u-padding__x--4 u-padding__top--3 u-padding__bottom--1">
                        @icon([
                            'icon' => $listItem->icon, 
                            'size' => 'md',
                            'color' => 'primary'
                        ])
                        @endicon
    
                        @typography([
                            'element' => 'h4',
                            'variant' => 'p',
                            'id'      => 'mod-contactbanner-' . $id,
                            'classList' => ['u-margin__left--2']
                        ])
    
                        {{$listItem->title}}
                        @endtypography
                    </div>

                    <div class="c-card__body u-padding__x--4 u-padding__top--1 u-padding__bottom--3">
                        {!! $listItem->content !!}
                    </div>

                    @if($listItem->displayCta)
                        <div class="c-card__footer c-contact-banner__footer u-padding--2">
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
    @endif

</div>