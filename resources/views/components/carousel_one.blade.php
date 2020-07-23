<div class="container cta-100 ">
        <div class="container">
          <div class="row blog">
            <div class="col-md-12">
              <div id="blogCarousel" class="carousel slide container-blog" data-ride="carousel" data-interval="7000">
                <h2>In evidenza</h2>
                <ol class="carousel-indicators">
                  @foreach ($apartmentWithSponsor as $apartment)
                    <li data-target="#blogCarousel" data-slide-to="{{ $loop ->index }}" class="
                      @if ($loop->first)
                        active
                      @endif
                    ">
                  </li>
                  @endforeach
                </ol>
                <!-- Carousel items -->
                <div class="carousel-inner">
                  @foreach ($apartmentWithSponsor as $apartment)
                    <div class="carousel-item
                    @if ($loop->first)
                      active
                    @endif
                    ">
                      <div class="row">
                        <div class="col-md-12" >
                          <div class="item-box-blog">
                            <div class="item-box-blog-image">
                              <!--Date-->
                              <div class="created-at-stick">
                                <h6 id="created-at"> {{ $apartment -> created_at -> diffForHumans() }} </h6>
                              </div>
                              {{-- <div class="item-box-blog-date bg-blue-ui white"> <span class="mon">Augu 01</span> </div> --}}
                              <!--Image-->
                              <figure>
                                <img alt="{{ $apartment->title }}"
                                @if(stristr($apartment -> image, 'http'))
                                    src=" {{ asset($apartment -> image) }}"
                                @else
                                    src="{{ asset('storage/' . $apartment -> image) }}"
                                @endif
                                 >
                                </figure>
                            </div>
                            <div class="item-box-blog-body row align-items-center">
                              <!--Heading-->
                              <div class="col-sm-6 item-box-blog-heading">
                                <h4><strong>{{$apartment -> title}}</strong></h4>
                                <span><i class="fas fa-map-marker-alt"></i> in {{ $apartment -> address }}, {{ $apartment -> civicNumber}} - {{ $apartment -> city }}</span>
                              </div>
                              <div class="col-sm-6 itemini">
                                <div class="apartment-services">
                                  <ul class="servizi">
                                    <li><i class="fas fa-door-open"></i> {{ $apartment -> room_number }} stanze/a</li>
                                    <li><i class="fas fa-bed"></i>  {{ $apartment -> beds }} letti</li>
                                    <li><i class="fas fa-toilet"></i> {{ $apartment -> bath_number}} bagni</li>
                                    <li><i class="fas fa-vector-square"></i> {{ $apartment -> area }} mq</li>
                                  </ul>
                                </div>
                              </div>
                              <!--Text-->
                              <div class="item-box-blog-text">

                              </div>
                            </div>
                            <div class="mt"> <a href="{{ route('show', $apartment -> id) }}" tabindex="0" class="btn bg-blue-ui white read button-bnb">Vai all'appartamento</a> </div>
                            <!--Read More Button-->
                          </div>
                        </div>
                      </div>
                      <!--.row-->
                    </div>
                  @endforeach
                  <!--.item-->
                </div>
                <!--.carousel-inner-->
              </div>
              <!--.Carousel-->
            </div>
          </div>
        </div>
      </div>
