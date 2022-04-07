@extends('pages.template2')
@section('title', 'Home')

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/glightbox/dist/css/glightbox.min.css" />
<style>
    /*===== BLOG STYLE ONE =====*/
    .blog-edukasi {
        margin-top: 50px;
        /* background-color: beige; */
        border-radius: 10px;
    }

    .blog-edukasi .blog-image-edukasi {
        overflow: hidden;
        position: relative;
        border-radius: 10px 10px 0 0;
    }

    .blog-edukasi .blog-image-edukasi .category-edukasi {
        background-color: #16A085;
        color: white;
        font-size: 13px;
        padding: 7px 20px;
        position: absolute;
        right: 20px;
        top: 20px;
        border-radius: 30px;
    }

    .blog-edukasi .blog-image-edukasi .video-content {
        position: relative;
        border-radius: 10px 10px 0 0;
        overflow: hidden;
    }

    .blog-edukasi .blog-image-edukasi .video-content video {
        border-radius: 10px 10px 0 0;
        width: 734px;
        height: 300px;
        -o-object-fit: cover;
        object-fit: cover;
        -o-object-position: center;
        object-position: center;
    }

    .blog-edukasi .blog-image-edukasi .video-content a {
        text-align: center;
        background-color: var(--primary);
        color: #16A085;
        font-size: 30px;
        -webkit-transition: all 0.3s ease-out 0s;
        -moz-transition: all 0.3s ease-out 0s;
        -ms-transition: all 0.3s ease-out 0s;
        -o-transition: all 0.3s ease-out 0s;
        transition: all 0.3s ease-out 0s;
    }

    .blog-edukasi .blog-image-edukasi .video-content a:hover {
        background-color: var(--white);
        color: var(--primary);
    }

    .blog-edukasi .blog-image-edukasi img {
        width: 734;
        height: 300px;
        -o-object-fit: cover;
        object-fit: cover;
        -o-object-position: center;
        object-position: center;
        -webkit-transition: all 0.2s ease-out 0s;
        -moz-transition: all 0.2s ease-out 0s;
        -ms-transition: all 0.2s ease-out 0s;
        -o-transition: all 0.2s ease-out 0s;
        transition: all 0.2s ease-out 0s;
    }

    .blog-edukasi .blog-image-edukasi:hover img {
        -webkit-transform: rotate(1deg) scale(1.1);
        -moz-transform: rotate(1deg) scale(1.1);
        -ms-transform: rotate(1deg) scale(1.1);
        -o-transform: rotate(1deg) scale(1.1);
        transform: rotate(1deg) scale(1.1);
    }

    .blog-edukasi .blog-content-edukasi {
        padding: 30px;
        border: 1px solid var(--light-1);
        border-radius: 0 0 8px 8px;
        border-top: none;
    }

    @media (max-width: 767px) {
        .blog-edukasi .blog-image-edukasi img {
            width: 424px;
            height: 300px;
        }

        .blog-edukasi .blog-image-edukasi .video-content video {
            width: 424px;
            height: 300px;
        }
    }

    @media only screen and (min-width: 768px) and (max-width: 991px) {
        .blog-edukasi .blog-content-edukasi {
            padding: 25px;
        }
    }

    @media (max-width: 767px) {
        .blog-edukasi .blog-content-edukasi {
            padding: 20px;
        }
    }

    .blog-edukasi .blog-content-edukasi .blog-title-edukasi {
        display: block;
        margin-bottom: 10px;
    }

    .blog-edukasi .blog-content-edukasi .blog-title-edukasi a {
        font-weight: 600;
        color: var(--black);
        -webkit-transition: all 0.3s ease-out 0s;
        -moz-transition: all 0.3s ease-out 0s;
        -ms-transition: all 0.3s ease-out 0s;
        -o-transition: all 0.3s ease-out 0s;
        transition: all 0.3s ease-out 0s;
        line-height: 30px;
    }

    @media (max-width: 767px) {
        .blog-edukasi .blog-content-edukasi .blog-title-edukasi a {
            line-height: 24px;
        }
    }

    .blog-edukasi .blog-content-edukasi .blog-title-edukasi a:hover {
        color: var(--primary);
    }

    .blog-edukasi .blog-content-edukasi span {
        font-size: 14px;
        line-height: 20px;
        color: var(--dark-3);
        margin-top: 8px;
        margin-right: 12px;
        display: inline-block;
    }

    .blog-edukasi .blog-content-edukasi .text-edukasi {
        color: var(--dark-3);
        margin-top: 16px;
    }

    .blog-edukasi .blog-content-edukasi .more-edukasi {
        text-transform: uppercase;
        font-weight: 600;
        color: var(--primary);
        margin-top: 30px;
        display: inline-block;
    }

    .blog-edukasi .blog-content-edukasi .more-edukasi:hover {
        color: var(--primary-dark);
    }

    /*# sourceMappingURL=blog-01.css.map */
</style>

@section('content')
<!--====== BLOG PART START ======-->
<section class="blog-area pb-5">
    <div class="container">
        <div class="row justify-content-between">
            <div class="col-lg-8 col-md-12 col-sm-12">
                <div class="row">
                    <div class="col-lg-12 col-md-6 col-sm-12">
                        <div class="single-blog blog-edukasi border">
                            <div class="blog-image-edukasi">
                                <a href="/edukasi/{{ $education->slug }}">
                                    @php
                                        $ext = pathinfo($education->file, PATHINFO_EXTENSION)
                                    @endphp
                                    @if($ext == 'mp4' || $ext == 'mov' || $ext == 'vob' || $ext == 'mpeg' || $ext == '3gp' || $ext == 'avi' || $ext == 'wmv' || $ext == 'mov' || $ext == 'amv' || $ext == 'svi' || $ext == 'flv' || $ext == 'mkv' || $ext == 'webm' || $ext == 'gif' || $ext == 'asf')
                                    <div class="video-content text-center">
                                        <video src="{{ asset('../storage/edukasi/' . $education->file) }}" alt="Video"/>
                                        <a class="video-popup glightbox"
                                            href="{{ asset('../storage/edukasi/' . $education->file) }}">
                                            <i class="lni lni-play" style="position: absolute; top: 50%; left: 45%;"></i>
                                        </a>
                                    </div>
                                    @elseif ($ext == 'png' || $ext == 'jpg' || $ext == 'jpeg' || $ext == 'svg' || $ext == 'gif' || $ext == 'tiff' || $ext == 'psd' || $ext == 'pdf' || $ext == 'eps' || $ext == 'ai' || $ext == 'indd' || $ext == 'raw')
                                        <img src="{{ asset('../storage/edukasi/' . $education->file) }}" class="img-responsive" alt="Edukasi" />
                                    @elseif (empty($education->file))
                                        <img src="{{ asset('img/no-image.png') }}" class="img-responsive" alt="Edukasi" />
                                    @endif
                                </a>
                                <a href="javascript:void(0)" class="category-edukasi">
                                    @if (empty($education->education_category->name))
                                    Tidak ada kategori
                                    @else
                                    {{ $education->education_category->name }}
                                    @endif
                                </a>
                            </div>
                            <div class="blog-content-edukasi">
                                <h5 class="blog-title-edukasi text-capitalize">
                                    {{$education->title}}
                                </h5>
                                <div class="d-flex flex-row justify-content-between">
                                    <p><i class="lni lni-calendar"></i> {{ date("d F Y", strtotime($education->date))}}</p>
                                    <p><i class="lni lni-user"></i> @if (empty($education->user->name))
                                            Tidak ada author
                                        @else
                                            {{$education->user->name}}
                                        @endif
                                    </p>
                                    @if (empty($education->created_at))
                                        <p>
                                            <i class="lni lni-timer"></i>
                                            Tidak diketahui
                                        </p>
                                    @else
                                    <p>
                                        <i class="lni lni-timer"></i>
                                        {{$education->created_at->diffForHumans()}}
                                    </p>
                                    @endif
                                </div>
                                <p class="text-edukasi">
                                    {{$education->desc}}
                                </p>
                            </div>
                        </div>
                        <!-- single blog -->
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-12 col-sm-12">
                <div class="card" style="margin-top: 50px">
                    <div class="card-body my-3">
                        <p class="card-title fw-bold" style="font-size: 15px;">Pencarian</p>
                        <div class="pt-2 input-group justify-content-center">
                            <div class="form-outline">
                                <input type="search" placeholder="Cari edukasi .." id="form1" class="form-control" />
                            </div>
                            <button type="button" class="btn" style="background-color: #16A085; color: white">
                                <i class="bi bi-search"></i>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="card" style="margin-top: 30px">
                    <div class="card-body my-3">
                        <p class="card-title fw-bold" style="font-size: 15px;">Edukasi Lainnya</p>
                        @foreach ($educationsMore as $item)
                        <div class="pt-2 border-bottom mt-3 pb-4">
                            <div class="row justify-content-center">
                                <div class="col-4">
                                    <a href="/edukasi/{{ $item->slug }}">
                                        @php
                                            $extMore = pathinfo($item->file, PATHINFO_EXTENSION)
                                        @endphp
                                        @if($extMore == 'mp4' || $extMore == 'mov' || $extMore == 'vob' || $extMore == 'mpeg' || $extMore == '3gp' || $extMore == 'avi' || $extMore == 'wmv' || $extMore == 'mov' || $extMore == 'amv' || $extMore == 'svi' || $extMore == 'flv' || $extMore == 'mkv' || $extMore == 'webm' || $extMore == 'gif' || $extMore == 'asf')
                                        <div class="text-center">
                                            <video src="{{ asset('../storage/edukasi/' . $item->file) }}" alt="Video" style="width: 92px; height: 60px; -o-object-fit: cover; object-fit: cover; -o-object-position: center; object-position: center;"/>
                                        </div>
                                        @elseif ($extMore == 'png' || $extMore == 'jpg' || $extMore == 'jpeg' || $extMore == 'svg' || $extMore == 'gif' || $extMore == 'tiff' || $extMore == 'psd' || $extMore == 'pdf' || $extMore == 'eps' || $extMore == 'ai' || $extMore == 'indd' || $extMore == 'raw')
                                            <img src="{{ asset('../storage/edukasi/' . $item->file) }}" class="img-responsive" alt="Edukasi" />
                                        @elseif (empty($item->file))
                                            <img src="{{ asset('img/no-image.png') }}" class="img-responsive" alt="Edukasi" />
                                        @endif
                                    </a>
                                </div>
                                <div class="col-8">
                                    <p class="card-text pb-2 text-capitalize">{{$item->title}}</p>
                                    <small><i class="lni lni-calendar"></i> {{ date("d-F-Y", strtotime($item->date))}}</small>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                <div class="card" style="margin-top: 30px">
                    <div class="card-body my-3">
                        <p class="card-title fw-bold" style="font-size: 15px;">Kategori Edukasi</p>
                        <div class="pt-2 row">
                            @foreach ($categories as $item)
                                <a href="" style="color: var(--primary);"><p>{{$item->name}}</p></a>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- row -->
    </div>
    <!-- container -->
</section>
<!--====== BLOG PART ENDS ======-->

<script src="https://cdn.jsdelivr.net/gh/mcstudios/glightbox/dist/js/glightbox.min.js"></script>

<script>
    //========= glightbox
    const videoTwo = GLightbox({
        selector: ".glightbox",
        type: "video",
        source: "youtube", //vimeo, youtube or local
        width: 900,
        autoplayVideos: true,
    });
</script>
@endsection
