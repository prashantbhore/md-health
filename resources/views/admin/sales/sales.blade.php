@extends('admin.layout.layout') @section("content")
<section class="main-content">
    <div class="content-wrapper">
        <div class="page-title">Sales</div>
        <div class="row top-cards">
            
            <div class="col-md-3 mb-3">
                <a href="{{URL('admin/md-profit')}}" class="text-decoration-none text-dark">
                    <div class="card position-relative">
                        <div class="card-body">
                            <div class="d-flex align-items-center gap-2">
                                <div class="card-icon">
                                    <svg width="30" height="30" viewBox="0 0 30 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M10.422 39.54C9.666 39.54 8.838 39.486 7.938 39.378C7.038 39.306 6.228 39.18 5.508 39V22.476L0.27 24.258V19.56L5.508 17.778V14.43L0.27 16.212V11.514L5.508 9.732V0.443998H13.392V7.032L21.816 4.116V8.814L13.392 11.73V15.078L21.816 12.162V16.806L13.392 19.722V32.952C15.66 32.556 17.424 31.8 18.684 30.684C19.98 29.568 20.88 28.11 21.384 26.31C21.924 24.51 22.194 22.44 22.194 20.1H29.592C29.592 22.584 29.268 24.996 28.62 27.336C27.972 29.64 26.91 31.71 25.434 33.546C23.994 35.382 22.032 36.84 19.548 37.92C17.1 39 14.058 39.54 10.422 39.54Z" fill="#EBEBEB" />
                                    </svg>
                                </div>
                                <div class="card-text d-flex flex-column">
                                    <p>Total Income (Weekly)</p>
                                    <h4>366K</h4>
                                </div>
                                <span class="link-open">
                                    <img src="{{URL::asset('admin/assets/img/link-open.png')}}" alt="">
                                </span>
                            </div>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-md-3 mb-3">
                <a href="{{URL('admin/md-health-sales')}}" class="text-decoration-none text-dark">
                      <div class="card position-relative">
                          <div class="card-body">
                              <div class="d-flex align-items-center gap-2">
                                  <div class="card-icon">
                                      <svg width="30" height="30" viewBox="0 0 30 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                                          <path d="M10.422 39.54C9.666 39.54 8.838 39.486 7.938 39.378C7.038 39.306 6.228 39.18 5.508 39V22.476L0.27 24.258V19.56L5.508 17.778V14.43L0.27 16.212V11.514L5.508 9.732V0.443998H13.392V7.032L21.816 4.116V8.814L13.392 11.73V15.078L21.816 12.162V16.806L13.392 19.722V32.952C15.66 32.556 17.424 31.8 18.684 30.684C19.98 29.568 20.88 28.11 21.384 26.31C21.924 24.51 22.194 22.44 22.194 20.1H29.592C29.592 22.584 29.268 24.996 28.62 27.336C27.972 29.64 26.91 31.71 25.434 33.546C23.994 35.382 22.032 36.84 19.548 37.92C17.1 39 14.058 39.54 10.422 39.54Z" fill="#EBEBEB" />
                                      </svg>
                                  </div>
                                  <div class="card-text d-flex flex-column">
                                      <p>MDhealth Sales</p>
                                      <h4>172K</h4>
                                  </div>
                                  <span class="link-open">
                                      <img src="{{URL::asset('admin/assets/img/link-open.png')}}" alt="">
                                  </span>
                              </div>
                          </div>
                      </div>
                  </a>
              </div>

            <div class="col-md-3 mb-3">
                <a href="#" class="text-decoration-none text-dark cursor-default">
                    <div class="card position-relative">
                        <div class="card-body">
                            <div class="d-flex align-items-center gap-2">
                                <div class="card-icon">
                                    <svg width="30" height="30" viewBox="0 0 30 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M10.422 39.54C9.666 39.54 8.838 39.486 7.938 39.378C7.038 39.306 6.228 39.18 5.508 39V22.476L0.27 24.258V19.56L5.508 17.778V14.43L0.27 16.212V11.514L5.508 9.732V0.443998H13.392V7.032L21.816 4.116V8.814L13.392 11.73V15.078L21.816 12.162V16.806L13.392 19.722V32.952C15.66 32.556 17.424 31.8 18.684 30.684C19.98 29.568 20.88 28.11 21.384 26.31C21.924 24.51 22.194 22.44 22.194 20.1H29.592C29.592 22.584 29.268 24.996 28.62 27.336C27.972 29.64 26.91 31.71 25.434 33.546C23.994 35.382 22.032 36.84 19.548 37.92C17.1 39 14.058 39.54 10.422 39.54Z" fill="#EBEBEB" />
                                    </svg>
                                </div>
                                <div class="card-text d-flex flex-column">
                                    <p>MDfood Sales</p>
                                    <h4>93K</h4>
                                </div>
                                <span class="link-open">
                                    <img src="{{URL::asset('admin/assets/img/link-open.png')}}" alt="">
                                </span>
                            </div>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-md-3 mb-3">
                <a href="#" class="text-decoration-none text-dark">
                    <div class="card position-relative">
                        <div class="card-body">
                            <div class="d-flex align-items-center gap-2">
                                <div class="card-icon">
                                    <svg width="30" height="30" viewBox="0 0 30 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M10.422 39.54C9.666 39.54 8.838 39.486 7.938 39.378C7.038 39.306 6.228 39.18 5.508 39V22.476L0.27 24.258V19.56L5.508 17.778V14.43L0.27 16.212V11.514L5.508 9.732V0.443998H13.392V7.032L21.816 4.116V8.814L13.392 11.73V15.078L21.816 12.162V16.806L13.392 19.722V32.952C15.66 32.556 17.424 31.8 18.684 30.684C19.98 29.568 20.88 28.11 21.384 26.31C21.924 24.51 22.194 22.44 22.194 20.1H29.592C29.592 22.584 29.268 24.996 28.62 27.336C27.972 29.64 26.91 31.71 25.434 33.546C23.994 35.382 22.032 36.84 19.548 37.92C17.1 39 14.058 39.54 10.422 39.54Z" fill="#EBEBEB" />
                                    </svg>
                                </div>
                                <div class="card-text d-flex flex-column">
                                    <p>Mdbooking Sales</p>
                                    <h4>129K</h4>
                                </div>
                                <span class="link-open">
                                    <img src="{{URL::asset('admin/assets/img/link-open.png')}}" alt="">
                                </span>
                            </div>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-md-3 mb-3">
                <a href="#" class="text-decoration-none text-dark cursor-default">
                    <div class="card position-relative">
                        <div class="card-body">
                            <div class="d-flex align-items-center gap-2">
                                <div class="card-icon">
                                    <svg width="30" height="30" viewBox="0 0 30 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M10.422 39.54C9.666 39.54 8.838 39.486 7.938 39.378C7.038 39.306 6.228 39.18 5.508 39V22.476L0.27 24.258V19.56L5.508 17.778V14.43L0.27 16.212V11.514L5.508 9.732V0.443998H13.392V7.032L21.816 4.116V8.814L13.392 11.73V15.078L21.816 12.162V16.806L13.392 19.722V32.952C15.66 32.556 17.424 31.8 18.684 30.684C19.98 29.568 20.88 28.11 21.384 26.31C21.924 24.51 22.194 22.44 22.194 20.1H29.592C29.592 22.584 29.268 24.996 28.62 27.336C27.972 29.64 26.91 31.71 25.434 33.546C23.994 35.382 22.032 36.84 19.548 37.92C17.1 39 14.058 39.54 10.422 39.54Z" fill="#EBEBEB" />
                                    </svg>
                                </div>
                                <div class="card-text d-flex flex-column">
                                    <p>Home Service Sales</p>
                                    <h4>29K</h4>
                                </div>
                                <span class="link-open">
                                    <img src="{{URL::asset('admin/assets/img/link-open.png')}}" alt="">
                                </span>
                            </div>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-md-3 mb-3">
                <a href="#" class="text-decoration-none text-dark cursor-default">
                    <div class="card position-relative">
                        <div class="card-body">
                            <div class="d-flex align-items-center gap-2">
                                <div class="card-icon">
                                    <svg width="30" height="30" viewBox="0 0 30 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M10.422 39.54C9.666 39.54 8.838 39.486 7.938 39.378C7.038 39.306 6.228 39.18 5.508 39V22.476L0.27 24.258V19.56L5.508 17.778V14.43L0.27 16.212V11.514L5.508 9.732V0.443998H13.392V7.032L21.816 4.116V8.814L13.392 11.73V15.078L21.816 12.162V16.806L13.392 19.722V32.952C15.66 32.556 17.424 31.8 18.684 30.684C19.98 29.568 20.88 28.11 21.384 26.31C21.924 24.51 22.194 22.44 22.194 20.1H29.592C29.592 22.584 29.268 24.996 28.62 27.336C27.972 29.64 26.91 31.71 25.434 33.546C23.994 35.382 22.032 36.84 19.548 37.92C17.1 39 14.058 39.54 10.422 39.54Z" fill="#EBEBEB" />
                                    </svg>
                                </div>
                                <div class="card-text d-flex flex-column">
                                    <p>MDshop Sales</p>
                                    <h4>292K</h4>
                                </div>
                                <span class="link-open">
                                    <img src="{{URL::asset('admin/assets/img/link-open.png')}}" alt="">
                                </span>
                            </div>
                        </div>
                    </div>
                </a>
            </div>

     


            <!-- Orders -->
            <div class="col-md-12 my-3">
                <div class="card">
                    <div class="card-body">
                        <!-- Filters -->
                        <div class="w-full d-flex align-items-center justify-content-end gap-2 mb-3 filters">
                            <div class="card-title me-auto">Orders</div>
                            <input type="text" class="form-control" placeholder="Search">
                            <select class="form-select form-select-sm w-15">
                                <option selected>Select Type</option>
                                <option value="1">Treatment Packages</option>
                                <option value="2">Shop Orders</option>
                                <option value="3">Food Orders</option>
                                <option value="3">Home Service Orders</option>
                                <option value="3">Booking Orders</option>
                            </select>
                            <select class="form-select form-select-sm w-15 ms-3">
                                <option selected>Select Status</option>
                                <option value="1">Pending</option>
                                <option value="2">Inprocess</option>
                                <option value="3">Completed</option>
                                <option value="3">Cancelled</option>
                            </select>
                        </div>
                        <div class="table-responsive" style="overflow-x: hidden">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">Sr. No.</th>
                                        <th scope="col">Type</th>
                                        <th scope="col">Order ID</th>
                                        <th scope="col">Date</th>
                                        <th scope="col">Customer</th>
                                        <th scope="col">Product</th>
                                        <th scope="col">Price</th>
                                        <th scope="col">Status</th>
                                        <th scope="col"></th>
                                    </tr>
                                </thead>

                                <tbody>
                                   
                                    <tr>
                                        <td>1</td>
                                        <td>Shop Orders</td>
                                        <td scope="row">#MD8739</td>
                                        <td>22 Dec 2023 10:23am</td>
                                        <td>Melissa Pod</td>
                                        <td>Home Patient Care Service</td>
                                        <td>₺ 29.382,90</td>
                                        <td>
                                            <div class="pending">
                                                Pending
                                            </div>
                                        </td>
                                        <td class="text-end">
                                            <a href="{{URL('admin/sales-details')}}">
                                                <img src="{{URL::asset('admin/assets/img/re-direct.png')}}" alt="">
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>Shop Orders</td>
                                        <td scope="row">#MD8739</td>
                                        <td>22 Dec 2023 10:23am</td>
                                        <td>Ali Danish</td>
                                        <td>Hearth Valve Replacement Surgery</td>
                                        <td>₺ 34.382,90</td>
                                        <td>
                                            <div class="in-progress">
                                                In Progress
                                            </div>
                                        </td>
                                        <td class="text-end">
                                            <a href="{{URL('admin/sales-details')}}">
                                                <img src="{{URL::asset('admin/assets/img/re-direct.png')}}" alt="">
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td>Shop Orders</td>
                                        <td scope="row">#MD8739</td>
                                        <td>22 Dec 2023 10:23am</td>
                                        <td>Melissa Pod</td>
                                        <td>Home Patient Care Service</td>
                                        <td>₺ 29.382,90</td>
                                        <td>
                                            <div class="completed">
                                                Completed
                                            </div>
                                        </td>
                                        <td class="text-end">
                                            <a href="{{URL('admin/sales-details')}}">
                                                <img src="{{URL::asset('admin/assets/img/re-direct.png')}}" alt="">
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>4</td>
                                        <td>Shop Orders</td>
                                        <td scope="row">#MD8739</td>
                                        <td>22 Dec 2023 10:23am</td>
                                        <td>Ali Danish</td>
                                        <td>Hearth Valve Replacement Surgery</td>
                                        <td>₺ 34.382,90</td>
                                        <td>
                                            <div class="pending">
                                                Pending
                                            </div>

                                        </td>
                                        <td class="text-end">
                                            <a href="{{URL('admin/sales-details')}}">
                                                <img src="{{URL::asset('admin/assets/img/re-direct.png')}}" alt="">
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>5</td>
                                        <td>Shop Orders</td>
                                        <td scope="row">#MD8739</td>
                                        <td>22 Dec 2023 10:23am</td>
                                        <td>Melissa Pod</td>
                                        <td>Home Patient Care Service</td>
                                        <td>₺ 29.382,90</td>
                                        <td>
                                            <div class="in-progress">
                                                In Progress
                                            </div>
                                        </td>
                                        <td class="text-end">
                                            <a href="{{URL('admin/sales-details')}}">
                                                <img src="{{URL::asset('admin/assets/img/re-direct.png')}}" alt="">
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>6</td>
                                        <td>Shop Orders</td>
                                        <td scope="row">#MD8739</td>
                                        <td>22 Dec 2023 10:23am</td>
                                        <td>Ali Danish</td>
                                        <td>Hearth Valve Replacement Surgery</td>
                                        <td>₺ 34.382,90</td>
                                        <td>
                                            <div class="completed">
                                                Completed
                                            </div>
                                        </td>
                                        <td class="text-end">
                                            <a href="{{URL('admin/sales-details')}}">
                                                <img src="{{URL::asset('admin/assets/img/re-direct.png')}}" alt="">
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>7</td>
                                        <td>Shop Orders</td>
                                        <td scope="row">#MD8739</td>
                                        <td>22 Dec 2023 10:23am</td>
                                        <td>Melissa Pod</td>
                                        <td>Home Patient Care Service</td>
                                        <td>₺ 29.382,90</td>
                                        <td>
                                            <div class="pending">
                                                Pending
                                            </div>
                                        </td>
                                        <td class="text-end">
                                            <a href="{{URL('admin/sales-details')}}">
                                                <img src="{{URL::asset('admin/assets/img/re-direct.png')}}" alt="">
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>8</td>
                                        <td>Shop Orders</td>
                                        <td scope="row">#MD8739</td>
                                        <td>22 Dec 2023 10:23am</td>
                                        <td>Ali Danish</td>
                                        <td>Hearth Valve Replacement Surgery</td>
                                        <td>₺ 34.382,90</td>
                                        <td>
                                            <div class="in-progress">
                                                In Progress
                                            </div>
                                        </td>
                                        <td class="text-end">
                                            <a href="{{URL('admin/sales-details')}}">
                                                <img src="{{URL::asset('admin/assets/img/re-direct.png')}}" alt="">
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>9</td>
                                        <td>Shop Orders</td>
                                        <td scope="row">#MD8739</td>
                                        <td>22 Dec 2023 10:23am</td>
                                        <td>Melissa Pod</td>
                                        <td>Home Patient Care Service</td>
                                        <td>₺ 29.382,90</td>
                                        <td>
                                            <div class="completed">
                                                Completed
                                            </div>
                                        </td>
                                        <td class="text-end">
                                            <a href="{{URL('admin/sales-details')}}">
                                                <img src="{{URL::asset('admin/assets/img/re-direct.png')}}" alt="">
                                            </a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <nav aria-label="Page navigation example">
                                <ul class="pagination justify-content-center">
                                    <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                                    <li class="page-item"><a class="page-link" href="#">4</a></li>
                                    <li class="page-item"><a class="page-link" href="#">5</a></li>
                                    <li class="page-item"><a class="page-link" href="#">6</a></li>
                                </ul>
                            </nav>

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>
@endsection
@section('script')
<script>
    $(".salesLi").addClass("activeClass");
    $(".sales").addClass("md-active");
</script>
@endsection