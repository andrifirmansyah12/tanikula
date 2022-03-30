@extends('pages.template2')
@section('title', 'Home')

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/glightbox/dist/css/glightbox.min.css" />
<style>
    /*===== BLOG STYLE ONE =====*/
    .blog-edukasi {
        margin-top: 50px;
        background-color: beige;
    }

    .blog-edukasi .blog-image-edukasi {
        overflow: hidden;
        border-radius: 8px 8px 0 0;
        position: relative;
    }

    .blog-edukasi .blog-image-edukasi .category-edukasi {
        background-color: beige;
        color: black;
        font-size: 13px;
        padding: 7px 20px;
        position: absolute;
        right: 20px;
        top: 20px;
        border-radius: 30px;
    }

    .blog-edukasi .blog-image-edukasi .video-content {
        position: relative;
        border-radius: 8px;
        overflow: hidden;
    }

    .blog-edukasi .blog-image-edukasi .video-content img {
        border-radius: 8px;
    }

    .blog-edukasi .blog-image-edukasi .video-content a {
        text-align: center;
        background-color: var(--primary);
        color: beige;
        font-size: 30px;
        -webkit-transition: all 0.3s ease-out 0s;
        -moz-transition: all 0.3s ease-out 0s;
        -ms-transition: all 0.3s ease-out 0s;
        -o-transition: all 0.3s ease-out 0s;
        transition: all 0.3s ease-out 0s;
        padding-left: 3px;
    }

    .blog-edukasi .blog-image-edukasi .video-content a:hover {
        background-color: var(--white);
        color: var(--primary);
    }

    .blog-edukasi .blog-image-edukasi img {
        width: 360px;
        height: 220px;
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
            width: 440px;
            height: 220px;
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
                    @foreach ($educations as $item)
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="single-blog blog-edukasi">
                            <div class="blog-image-edukasi">
                                <a href="javascript:void(0)">
                                    @php
                                        $ext = pathinfo($item->file, PATHINFO_EXTENSION)
                                    @endphp
                                    @if($ext == 'mp4' || $ext == 'mov' || $ext == 'vob' || $ext == 'mpeg' || $ext == '3gp' || $ext == 'avi' || $ext == 'wmv' || $ext == 'mov' || $ext == 'amv' || $ext == 'svi' || $ext == 'flv' || $ext == 'mkv' || $ext == 'webm' || $ext == 'gif' || $ext == 'asf')
                                    <div class="video-content text-center">
                                        <img src="https://cdn.ayroui.com/1.0/images/video/video.png" alt="Video" />
                                        <a class="video-popup glightbox"
                                            href="https://www.youtube.com/watch?v=NJbXptdalP0">
                                            <i class="lni lni-play" style="position: absolute; top: 50%; left: 45%;"></i>
                                        </a>
                                    </div>
                                    @elseif ($ext == 'png' || $ext == 'jpg' || $ext == 'jpeg' || $ext == 'svg' || $ext == 'gif' || $ext == 'tiff' || $ext == 'psd' || $ext == 'pdf' || $ext == 'eps' || $ext == 'ai' || $ext == 'indd' || $ext == 'raw')
                                        @if ($item->file)
                                            <img src="{{ asset('../storage/edukasi/' . $item->file) }}" class="img-responsive" alt="Edukasi" />
                                        @else
                                            <img src="{{ asset('img/no-image.png') }}" class="img-responsive" alt="Edukasi" />
                                        @endif
                                    @endif
                                </a>
                                <a href="javascript:void(0)" class="category-edukasi">
                                    @if (empty($item->education_category->name))
                                    Tidak ada kategori
                                    @else
                                    {{ $item->education_category->name }}
                                    @endif
                                </a>
                            </div>
                            <div class="blog-content-edukasi">
                                <h5 class="blog-title-edukasi">
                                    <a href="javascript:void(0)">
                                        {{$item->title}}
                                    </a>
                                </h5>
                                <span><i class="lni lni-calendar"></i> {{ date("d F Y", strtotime($item->date))}}</span>
                                <span><i class="lni lni-user"></i> {{Auth::user()->name}}</span>
                                <p class="text-edukasi"
                                    style="display: -webkit-box; -webkit-box-orient: vertical; -webkit-line-clamp: 4; overflow: hidden;">
                                    {{$item->desc}}
                                </p>
                                <a class="more-edukasi" href="javascript:void(0)">Baca Selengkapnya</a>
                            </div>
                        </div>
                        <!-- single blog -->
                    </div>
                    @endforeach
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
                            <button type="button" class="btn btn-primary">
                                <i class="bi bi-search"></i>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="card" style="margin-top: 30px">
                    <div class="card-body my-3">
                        <p class="card-title fw-bold" style="font-size: 15px;">Edukasi Lainnya</p>
                        <div class="pt-2 border-bottom pb-4">
                            <div class="row justify-content-center">
                                <div class="col-4">
                                    <img src="https://mdbcdn.b-cdn.net/img/new/standard/nature/182.webp"
                                        class="img-fluid" alt="Sunset Over the Sea" width="100px" height="150px" />
                                </div>
                                <div class="col-8">
                                    <p class="card-text pb-2">Some quick example text to build on the card title and
                                        make up the
                                        bulk of the card's content.</p>
                                    <small><i class="lni lni-calendar"></i> 19-September-2022</small>
                                </div>
                            </div>
                        </div>
                        <div class="pt-2 mt-3 pb-4">
                            <div class="row justify-content-center">
                                <div class="col-4">
                                    <img src="https://mdbcdn.b-cdn.net/img/new/standard/nature/182.webp"
                                        class="img-fluid" alt="Sunset Over the Sea" width="100px" height="150px" />
                                </div>
                                <div class="col-8">
                                    <p class="card-text pb-2">Some quick example text to build on the card title and
                                        make up the
                                        bulk of the card's content.</p>
                                    <small><i class="lni lni-calendar"></i> 19-September-2022</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card" style="margin-top: 30px">
                    <div class="card-body my-3">
                        <p class="card-title fw-bold" style="font-size: 15px;">Kategori Edukasi</p>
                        <div class="pt-2 row justify-content-between">
                            <p class="col-lg-6 col-md-5 col-6">Pupuk Organik</p>
                            <p class="col-lg-6 col-md-5 col-6">Pupuk Organik</p>
                            <p class="col-lg-6 col-md-5 col-6">Pupuk Organik</p>
                            <p class="col-lg-6 col-md-5 col-6">Pupuk Organik</p>
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
