
@inject('contentService', 'App\Services\ContentProvider')
<?php $pages = $contentService->getPageNavs(); ?>
<?php $otherPages = $contentService->getOtherPages(); ?>

<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        @foreach($pages as $page)

            @if($page->id==1)
                <li class="nav-item">
                    <a class="nav-link {{ !isset($pageSlug) ? 'collapsed' : ''}}" data-toggle="collapse" href="#home" aria-expanded="true" aria-controls="homepage">
                        <i class="menu-icon mdi mdi-content-copy"></i>
                        <span class="menu-title">Home</span>
                        <i class="menu-arrow"></i>
                    </a>
                </li>
                <div class="collapse  {{ !isset($pageSlug) ? 'show' : 'in'}}" id="home">
                    <ul class="nav flex-column sub-menu">
                            <li class="nav-item">
                                <a class="nav-link" href="{{ URL('admin/home') }}">Content</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ URL('admin/content/home-slides') }}">Image Slides</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ URL('admin/content/announcements') }}">Announcements</a>
                            </li>
                    </ul>
                </div>
            @else
                <li class="nav-item">
                    <a class="nav-link {{ $pageSlug==$page->slug ? 'collapsed' : ''}}" data-toggle="collapse" href="#{{$page->slug}}" aria-expanded="true" aria-controls="homepage">
                        <i class="menu-icon mdi mdi-content-copy"></i>
                        <span class="menu-title">{{ $page->name_en }}</span>
                        <i class="menu-arrow"></i>
                    </a>
                    @if(count($page->sections))
                    <div class="collapse {{ $pageSlug==$page->slug ? 'show' : 'in'}}" id="{{$page->slug}}">
                        <ul class="nav flex-column sub-menu">
                            @foreach($page->sections as $section)

                                @if($section->id == 20)
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ URL('admin/content/press-releases') }}">News and Press Releases</a>
                                    </li>
                                @elseif($section->id == 21)
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ URL('admin/content/economic-bulletins') }}">Economic Bulletin</a>
                                    </li>
                                @elseif($section->id == 30)
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ URL('admin/content/newsletters-media') }}">Newsletters</a>
                                    </li>
                                @elseif($section->id == 26)
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ URL('admin/content/galleries') }}">Gallery</a>
                                    </li>
                                @else
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ URL('admin/section/'.$page->slug.'/'.$section->id) }}">{{ $section->title_en }}</a>
                                    </li>
                                @endif

                                @if($section->id == 16)
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ URL('admin/content/timeline') }}">Timeline</a>
                                    </li>
                                @endif
                            @endforeach
                        </ul>
                    </div>
                    @endif
                </li>
            @endif
        @endforeach


        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#other" aria-expanded="true" aria-controls="homepage">
                <i class="menu-icon mdi mdi-content-copy"></i>
                <span class="menu-title">Other Pages</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse in" id="other">
                <ul class="nav flex-column sub-menu">
                    @foreach($otherPages as $page)
                        <li class="nav-item">
                            <a class="nav-link" href="{{ URL('admin/content/articles/edit/'.$page->id) }}">{{$page->title_en}}</a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </li>

        <li class="nav-item">
            <a href="{{ URL('admin/newsletters/') }}" class="nav-link">
                <i class="menu-icon mdi mdi-content-copy"></i>
                <span class="menu-title">Newsletter Entries</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link {{ $pageSlug == 'faqs' ? 'collapsed' : ''}}" data-toggle="collapse" href="#faqs" aria-expanded="true" aria-controls="homepage">
                <i class="menu-icon mdi mdi-content-copy"></i>
                <span class="menu-title">FAQ Questions</span>
                <i class="menu-arrow"></i>
            </a>
        </li>
        <div class="collapse  {{ $pageSlug == 'faqs' ? 'show' : 'in'}}" id="faqs">
            <ul class="nav flex-column sub-menu">
                <li class="nav-item">
                    <a class="nav-link" href="{{ URL('admin/faqs/3') }}">Visa FAQs DE</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ URL('admin/faqs/1') }}">Visa FAQs EN</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ URL('admin/faqs/5') }}">Visa FAQs AR</a>
                </li>
            </ul>
        </div>

    </ul>
</nav>
