<div class="slider-head mt-5">
    <!-- Start Hero Slider -->
    <div class="hero-slider">
        @php
            $heroes = App\Models\Hero::latest()->get();
        @endphp
        @if ($heroes->count() > 0)
            @foreach ($heroes as $hero)
            <!-- Start Single Slider -->
            <div class="single-slider"
                style="background-image: url('{{ asset('../storage/hero/' . $hero->image) }}');">
                {{-- <div class="content">
                    <h2 class="fw-bold text-secondary">
                        {{ $hero->name }}
                    </h2>
                </div> --}}
            </div>
            <!-- End Single Slider -->
            @endforeach
        @else
            <div class="single-slider"
                style="background-image: url('/img/hero.svg');">
            </div>
        @endif
    </div>
    <!-- End Hero Slider -->
</div>
