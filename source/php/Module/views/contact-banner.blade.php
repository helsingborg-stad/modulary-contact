<div id="contact" class="c-contact-banner u-print-display--none">

    @if(isset($ctaList) && !empty($ctaList))
        @group(['classList' => ['u-box-shadow--2']])
            @foreach ($ctaList as $index => $listItem)
                @card([
                    'classList' => [
                        'c-card--panel', 'card-item-'.$index
                    ],
                        'attributeList' => [
                        'aria-labelledby' => 'mod-contactbanner-' . $id
                    ]
                ])

                    <div class="c-card__header">
                        @icon([
                            'icon' => $listItem->icon, 'size' => 'md'
                        ])
                        @endicon
    
                        @typography([
                            'element' => 'h4',
                            'variant' => 'p',
                            'id'      => 'mod-contactbanner-' . $id
                        ])
    
                        {{$listItem->title}}
                        @endtypography
                    </div>
                    <div class="c-card__body">
                        {!! $listItem->content !!}
                    </div>
  
                @endcard
            @endforeach
        @endgroup
    @endif

</div>