@extends('admin.layout.layout') @section("content")
<section class="main-content">
    <div class="container">
        <div class="page-title">Sales</div>
        <div class="row top-cards">
            <div class="col mb-3 pe-0">
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
                            <a href="{{URL('/md-profit')}}" class="link-open">
                                <img src="{{URL::asset('admin/assets/img/link-open.png')}}" alt="">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col mb-3 pe-0">
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
                            <a href="#" class="link-open">
                                <img src="{{URL::asset('admin/assets/img/link-open.png')}}" alt="">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col mb-3 pe-0">
                <div class="card position-relative bg-green">
                    <div class="card-body">
                        <div class="d-flex align-items-center gap-2">
                            <div class="card-icon">
                                <svg width="30" height="30" viewBox="0 0 30 40" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M10.422 39.54C9.666 39.54 8.838 39.486 7.938 39.378C7.038 39.306 6.228 39.18 5.508 39V22.476L0.27 24.258V19.56L5.508 17.778V14.43L0.27 16.212V11.514L5.508 9.732V0.443998H13.392V7.032L21.816 4.116V8.814L13.392 11.73V15.078L21.816 12.162V16.806L13.392 19.722V32.952C15.66 32.556 17.424 31.8 18.684 30.684C19.98 29.568 20.88 28.11 21.384 26.31C21.924 24.51 22.194 22.44 22.194 20.1H29.592C29.592 22.584 29.268 24.996 28.62 27.336C27.972 29.64 26.91 31.71 25.434 33.546C23.994 35.382 22.032 36.84 19.548 37.92C17.1 39 14.058 39.54 10.422 39.54Z" fill="#000" />
                                </svg>
                            </div>
                            <div class="card-text d-flex flex-column">
                                <p style="color: #000;">Mdbooking Sales</p>
                                <h4>129K</h4>
                            </div>
                        
                        </div>
                    </div>
                </div>
            </div>
            <div class="col mb-3 pe-0">
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
                            <a href="#" class="link-open">
                                <img src="{{URL::asset('admin/assets/img/link-open.png')}}" alt="">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col mb-3">
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
                            <a href="#" class="link-open">
                                <img src="{{URL::asset('admin/assets/img/link-open.png')}}" alt="">
                            </a>
                        </div>
                    </div>
                </div>
            </div>


            <!-- Orders -->
            <div class="col-md-12 my-3">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title">Orders</div>
                        <!-- Filters -->
                        <div class="w-full d-flex align-items-center justify-content-end gap-2 mb-3">
                            <input type="text" class="form-control" placeholder="Search">
                            <select class="form-select form-select-sm">
                                <option selected>All Orders</option>
                                <option value="1"><span class="md-bold">MD</span>health</option>
                                <option value="2"><span class="md-bold">MD</span>shop</option>
                                <option value="3"><span class="md-bold">MD</span>booking</option>
                            </select>
                            <select class="form-select form-select-sm">
                                <option selected>Active Orders</option>
                                <option value="2">Completed Orders</option>
                                <option value="3">Denied Orders</option>
                            </select>
                        </div>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col">Created</th>
                                        <th scope="col">Customer</th>
                                        <th scope="col">Product</th>
                                        <th scope="col">Price</th>
                                        <th scope="col">Status</th>
                                        <th scope="col"></th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <tr>
                                        <th scope="row">#MD8739</th>
                                        <td>8 Min Ago</td>
                                        <td>Ali Danish</td>
                                        <td>AYT to IST Flight Ticket</td>
                                        <td>₺ 34.382,90</td>
                                        <td>
                                            <div class="completed">
                                                Completed
                                            </div>
                                        </td>
                                        <td class="text-end">
                                            <a href="{{URL('/sales-details')}}">
                                                <img src="{{URL::asset('admin/assets/img/re-direct.png')}}" alt="">
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">#MD8739</th>
                                        <td>8 Min Ago</td>
                                        <td>Melissa Pod</td>
                                        <td>Evony Medikal Maske 50 pc</td>
                                        <td>₺ 29.382,90</td>
                                        <td>
                                            <div class="pending">
                                                Pending
                                            </div>
                                        </td>
                                        <td class="text-end">
                                            <a href="{{URL('/sales-details')}}">
                                                <img src="{{URL::asset('admin/assets/img/re-direct.png')}}" alt="">
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">#MD8739</th>
                                        <td>8 Min Ago</td>
                                        <td>Ali Danish</td>
                                        <td>Hearth Valve Replacement Surgery</td>
                                        <td>₺ 34.382,90</td>
                                        <td>
                                            <div class="in-progress">
                                                In Progress
                                            </div>
                                        </td>
                                        <td class="text-end">
                                            <a href="{{URL('/sales-details')}}">
                                                <img src="{{URL::asset('admin/assets/img/re-direct.png')}}" alt="">
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">#MD8739</th>
                                        <td>8 Min Ago</td>
                                        <td>Melissa Pod</td>
                                        <td>Home Patient Care Service</td>
                                        <td>₺ 29.382,90</td>
                                        <td>
                                            <div class="completed">
                                                Completed
                                            </div>
                                        </td>
                                        <td class="text-end">
                                            <a href="{{URL('/sales-details')}}">
                                                <img src="{{URL::asset('admin/assets/img/re-direct.png')}}" alt="">
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">#MD8739</th>
                                        <td>8 Min Ago</td>
                                        <td>Ali Danish</td>
                                        <td>Hearth Valve Replacement Surgery</td>
                                        <td>₺ 34.382,90</td>
                                        <td>
                                            <div class="pending">
                                                Pending
                                            </div>

                                        </td>
                                        <td class="text-end">
                                            <a href="{{URL('/sales-details')}}">
                                                <img src="{{URL::asset('admin/assets/img/re-direct.png')}}" alt="">
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">#MD8739</th>
                                        <td>8 Min Ago</td>
                                        <td>Melissa Pod</td>
                                        <td>Home Patient Care Service</td>
                                        <td>₺ 29.382,90</td>
                                        <td>
                                            <div class="in-progress">
                                                In Progress
                                            </div>
                                        </td>
                                        <td class="text-end">
                                            <a href="{{URL('/sales-details')}}">
                                                <img src="{{URL::asset('admin/assets/img/re-direct.png')}}" alt="">
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">#MD8739</th>
                                        <td>8 Min Ago</td>
                                        <td>Ali Danish</td>
                                        <td>Hearth Valve Replacement Surgery</td>
                                        <td>₺ 34.382,90</td>
                                        <td>
                                            <div class="completed">
                                                Completed
                                            </div>
                                        </td>
                                        <td class="text-end">
                                            <a href="{{URL('/sales-details')}}">
                                                <img src="{{URL::asset('admin/assets/img/re-direct.png')}}" alt="">
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">#MD8739</th>
                                        <td>8 Min Ago</td>
                                        <td>Melissa Pod</td>
                                        <td>Home Patient Care Service</td>
                                        <td>₺ 29.382,90</td>
                                        <td>
                                            <div class="pending">
                                                Pending
                                            </div>
                                        </td>
                                        <td class="text-end">
                                            <a href="{{URL('/sales-details')}}">
                                                <img src="{{URL::asset('admin/assets/img/re-direct.png')}}" alt="">
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">#MD8739</th>
                                        <td>8 Min Ago</td>
                                        <td>Ali Danish</td>
                                        <td>Hearth Valve Replacement Surgery</td>
                                        <td>₺ 34.382,90</td>
                                        <td>
                                            <div class="in-progress">
                                                In Progress
                                            </div>
                                        </td>
                                        <td class="text-end">
                                            <a href="{{URL('/sales-details')}}">
                                                <img src="{{URL::asset('admin/assets/img/re-direct.png')}}" alt="">
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">#MD8739</th>
                                        <td>8 Min Ago</td>
                                        <td>Melissa Pod</td>
                                        <td>Home Patient Care Service</td>
                                        <td>₺ 29.382,90</td>
                                        <td>
                                            <div class="completed">
                                                Completed
                                            </div>
                                        </td>
                                        <td class="text-end">
                                            <a href="{{URL('/sales-details')}}">
                                                <img src="{{URL::asset('admin/assets/img/re-direct.png')}}" alt="">
                                            </a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <nav aria-label="Page navigation example">
                                <ul class="pagination justify-content-center">
                                    <li class="page-item"><a class="page-link" href="#">1</a></li>
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