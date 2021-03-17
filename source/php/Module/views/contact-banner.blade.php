<div id="contact" class="c-contact-banner u-print-display--none">
    <div class="container">
        <div class="o-grid">
            <div class="o-grid-12">
                <div class="c-contact-banner__wrapper">

                    <div class="c-contact-banner__items">

                        @if(isset($ctaList) && !empty($ctaList))
                            @foreach ($ctaList as $listItem)
                                <div class="c-contact-banner__item">

                                    <div class="c-contact-banner__item-inner">
                                        
                                        @typography([
                                            'element' => 'h4',
                                            'variant' => 'p',
                                            'classList' => ['c-contact-banner__item-title']
                                        ])
                                            @icon([
                                                'icon' => $listItem->icon, 'size' => 'md'
                                            ])
                                            @endicon
                                            {{ $listItem->title }}
                                        
                                        @endtypography

                                        @typography([
                                            'element' => "span",
                                            'classList' => ['c-contact-banner__item-content-inner']
                                        ])
                                            {!! $listItem->content !!}
                                        @endtypography
              

                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>