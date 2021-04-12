<div id="contact" class="c-contact-banner u-print-display--none">

    @if(isset($ctaList) && !empty($ctaList))
        @group(['classList' => ['u-box-shadow--2']])
            @foreach ($ctaList as $index => $listItem)
                @card([
                    'classList' => [
                        'c-card--panel', 'card-item-'.$index, 'u-padding__left--2',
                        'u-padding__right--2',
                        'u-padding__top--2',
                        'u-padding__bottom--2'
                    ],
                        'attributeList' => [
                        'aria-labelledby' => 'mod-contactbanner-' . $id
                    ]
                ])

                    <div class="c-card__header">
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
                            'classList' => ['u-color__text--info', 'u-margin__left--2']
                        ])
    
                        {{$listItem->title}}
                        @endtypography
                    </div>
                    <div class="c-card__body u-padding__left--2 u-padding__top--2 u-padding__bottom--2 u-padding__right--2">
                        {!! $listItem->content !!}
                    </div>
  
                @endcard
            @endforeach
        @endgroup
    @endif

</div>