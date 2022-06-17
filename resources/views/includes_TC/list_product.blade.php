<section class="ftco-section" >
            <div class="container">
                <div class="row justify-content-center mb-3 pb-3">
                    <div
                        class="col-md-12 heading-section text-center ftco-animate"
                    >
                        <span class="subheading">Sản Phẩm Nổi Bật</span>
                        <h2 class="mb-4">SHOP MAN</h2>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                	@foreach($sanphams as $sp)
                    <div class="col-md-6 col-lg-3 ftco-animate">
                        <div class="product" style="height:350px">
                            <a href="#" class="img-prod"
                                ><img
                                    class="img-fluid"
                                    src="/upload/sanpham/{{optional($sp->mausacs->first())->AnhMS}}"
                                    alt="Colorlib Template"
                                    style="height:260px"
                                />
                                
                                <span class="status">{{$sp->GiamGia}}%</span>
                                <div class="overlay"></div>
                            </a>
                            <div class="text py-3 pb-4 px-3 text-center">
                                <h3><a href="#">{{$sp->TenSP}}</a></h3>
                                <div class="d-flex">
                                </div>
                                <div class="bottom-area d-flex px-3">
                                    <div class="m-auto d-flex">
                                        <a
                                            href="/detail"
                                            class="add-to-cart d-flex justify-content-center align-items-center text-center"
                                            ng-click="detail({{$sp->MaSP}})"
                                        >
                                            <span
                                                
                                                ><i class="ion-ios-menu"></i
                                            ></span>
                                        </a>
                                        <a
                                            href="/"
                                            class="buy-now d-flex justify-content-center align-items-center mx-1"
                                            ng-click="addCart({{optional(optional(optional($sp->mausacs->first())->sizes)->first())->MaSize}})"
                                        >
                                            <span
                                                ><i class="ion-ios-cart"></i
                                            ></span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </section>