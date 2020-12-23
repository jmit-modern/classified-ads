@extends('site.master')

@section('siteContent')
<section id="main" class="clearfix myads-page">
    <div class="container">

        <div class="breadcrumb-section">
            <!-- breadcrumb -->
            <ol class="breadcrumb">
                <li><a href="{{url('/dashboard')}}">@lang('Home')</a></li>
                <li>@lang('Dashboard')</li>
            </ol><!-- breadcrumb -->						
            <h2 class="title">@lang('My Ads')</h2>
        </div><!-- banner -->

        @include('site.pages.dashboard.menu')			

        <div class="ads-info">
            <div class="row">
                <div class="col-sm-9">
                    <div class=" section">
                        <h2>@lang('My Ads')</h2>
                        
                        @foreach($userAds as $anAd)
                        
                        <!-- custom-list-item -->
                        <div class="custom-list-item row">
                            <!-- item-image -->
                            <div class="item-image-box col-sm-4">
                                <div class="item-image">
                                    <a href="{{url('ad/'.$anAd->post_id)}}"><img src="{{asset($anAd->postimages->first()->postimage_thumbnail)}}" alt="Image" class="img-responsive"></a>
                                </div><!-- item-image -->
                            </div>

                            <!-- rending-text -->
                            <div class="item-info col-sm-8">
                                <!-- ad-info -->
                                <div class="ad-info">
                                    <h3 class="item-price">{{currency($anAd->item_price,'AUD')}}<span class="label label-<?php if($anAd->status== 1){ echo "success";}else{echo "danger";}?> pull-right">published</span></h3>
                                    <h4 class="item-title"><a href="{{url('ad/'.$anAd->post_id)}}">{{$anAd->ad_title}}</a></h4>
                                    <div class="item-cat">
                                        <?php
                                        $columnCategoryTitle = __('category_title_en');
                                        $columnSubcategoryTitle = __('subcategory_title_en');
                                        ?>
                                        <span><a href="#">{{$anAd->subcategory->category->$columnCategoryTitle}}</a></span> /
                                        <span><a href="#">{{$anAd->subcategory->$columnSubcategoryTitle}}</a></span>
                                    </div>										
                                </div><!-- ad-info -->

                                <!-- ad-meta -->
                                <div class="ad-meta">
                                    <div class="meta-content">
                                        <span class="dated">@lang('Posted On:') <a href="#">{{ formatDateLocalized($anAd->created_at) }}</a></span>
                                        <span class="visitors">@lang('Visited:') {{number($anAd->views)}}</span> 
                                    </div>										
                                    <!-- item-info-right -->
                                    <div class="user-option pull-right">
                                        <?php
                                        //echo $anAd->isPromoted();
                                        ?>
                                        @if($anAd->isPromoted())
                                            <a class="promote-item" href="#" data-toggle="tooltip" data-placement="top" title="@lang('This ad is currently Promoted')"><i class="fa fa-star text-orange"></i></a>
                                        @else
                                            <a class="promote-item" href="{{url('/promote-ad/'.$anAd->post_id)}}" data-toggle="tooltip" data-placement="top" title="@lang('Make this ad for Promotion')"><i class="fa fa-star-o"></i></a>
                                        @endif                                        
                                        
                                        <a class="edit-item" href="{{url('/edit-ad/'.$anAd->post_id)}}" data-toggle="tooltip" data-placement="top" title="@lang('Edit this ad')"><i class="fa fa-pencil"></i></a>
                                        <a class="delete-item confirmDelete"  href="{{url('/delete-ad/'.$anAd->post_id)}}" data-toggle="tooltip" data-placement="top" title="@lang('Delete this ad')"><i class="fa fa-times"></i></a>
                                    </div><!-- item-info-right -->
                                </div><!-- ad-meta -->
                            </div><!-- item-info -->
                        </div>
                        <!-- custom-list-item -->
                        @endforeach
                    </div>
                </div>
                <!-- my-ads -->

                <!-- sidebar --> 
                @include('site.pages.dashboard.sidebar')

            </div><!-- row -->
        </div>
        <!-- row -->
    </div><!-- container -->
</section><!-- myads-page -->

@endsection