<nav class="side-nav">
    <a href="" class="intro-x flex items-center pl-5 pt-4">
        <img alt="Midone Tailwind HTML Admin Template" class="w-6" src="<?= BASE_URL . 'uploads/' ?>setting/logo.png">
        <span class="hidden xl:block text-white text-lg ml-3"><span class="font-medium">BeST</span> </span>
    </a>
    <div class="side-nav__devider my-6"></div>
    <ul>
        <li>
            <a href="<?= BASE_URL . 'best' ?>" class="side-menu side-menu<?php if ($active_link == 'dashboard') {
                                                                                echo '--active';
                                                                            } ?>">
                <div class="side-menu__icon"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home">
                        <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                        <polyline points="9 22 9 12 15 12 15 22"></polyline>
                    </svg> </div>
                <div class="side-menu__title"> Dashboard </div>
            </a>
        </li>

        <li>
            <a href="#" class="side-menu side-menu<?php if ($active_link == 'blogs') {
                                                        echo '--active';
                                                    } ?>">
                <div class="side-menu__icon"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file-text">
                        <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
                        <polyline points="14 2 14 8 20 8"></polyline>
                        <line x1="16" y1="13" x2="8" y2="13"></line>
                        <line x1="16" y1="17" x2="8" y2="17"></line>
                        <polyline points="10 9 9 9 8 9"></polyline>
                    </svg> </div>
                <div class="side-menu__title"> Blogs <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down side-menu__sub-icon">
                        <polyline points="6 9 12 15 18 9"></polyline>
                    </svg></div>
            </a>
            <ul class="">
                <li>
                    <a href="<?= BASE_URL . 'best/add_blog' ?>" class="side-menu">
                        <div class="side-menu__icon"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-activity">
                                <polyline points="22 12 18 12 15 21 9 3 6 12 2 12"></polyline>
                            </svg> </div>
                        <div class="side-menu__title"> Add New Blogs </div>
                    </a>
                </li>
                <li>
                    <a href="<?= BASE_URL . 'best/blogs' ?>" class="side-menu">
                        <div class="side-menu__icon"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-activity">
                                <polyline points="22 12 18 12 15 21 9 3 6 12 2 12"></polyline>
                            </svg> </div>
                        <div class="side-menu__title"> Blogs List </div>
                    </a>
                </li>
            </ul>
        </li>
        <li>
            <a href="#" class="side-menu side-menu<?php if ($active_link == 'portfolio') {
                                                        echo '--active';
                                                    } ?>">
                <div class="side-menu__icon"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-box">
                        <path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path>
                        <polyline points="3.27 6.96 12 12.01 20.73 6.96"></polyline>
                        <line x1="12" y1="22.08" x2="12" y2="12"></line>
                    </svg> </div>
                <div class="side-menu__title"> Portfolio <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down side-menu__sub-icon">
                        <polyline points="6 9 12 15 18 9"></polyline>
                    </svg> </div>
            </a>
            <ul class="">
                <li>
                    <a href="<?= BASE_URL . 'best/add_portfolio' ?>" class="side-menu">
                        <div class="side-menu__icon"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-activity">
                                <polyline points="22 12 18 12 15 21 9 3 6 12 2 12"></polyline>
                            </svg> </div>
                        <div class="side-menu__title"> Add New Portfolio </div>
                    </a>
                </li>
                <li>
                    <a href="<?= BASE_URL . 'best/portfolio' ?>" class="side-menu">
                        <div class="side-menu__icon"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-activity">
                                <polyline points="22 12 18 12 15 21 9 3 6 12 2 12"></polyline>
                            </svg> </div>
                        <div class="side-menu__title"> Portfolio Details </div>
                    </a>
                </li>

            </ul>
        </li>
        <li>
            <a href="#" class="side-menu side-menu<?php if ($active_link == 'products') {
                                                        echo '--active';
                                                    } ?>">
                <div class="side-menu__icon"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit">
                        <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path>
                        <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path>
                    </svg> </div>
                <div class="side-menu__title"> Products <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down side-menu__sub-icon">
                        <polyline points="6 9 12 15 18 9"></polyline>
                    </svg> </div>
            </a>
            <ul class="">
                <li>
                    <a href="<?= BASE_URL . 'best/add_products' ?>" class="side-menu">
                        <div class="side-menu__icon"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-activity">
                                <polyline points="22 12 18 12 15 21 9 3 6 12 2 12"></polyline>
                            </svg> </div>
                        <div class="side-menu__title"> Add New Product </div>
                    </a>
                </li>
                <li>
                    <a href="<?= BASE_URL . 'best/products' ?>" class="side-menu">
                        <div class="side-menu__icon"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-activity">
                                <polyline points="22 12 18 12 15 21 9 3 6 12 2 12"></polyline>
                            </svg> </div>
                        <div class="side-menu__title"> Product List </div>
                    </a>
                </li>
            </ul>
        </li>
        <li>
            <a href="#" class="side-menu side-menu">
                <div class="side-menu__icon"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trello">
                        <rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect>
                        <rect x="7" y="7" width="3" height="9"></rect>
                        <rect x="14" y="7" width="3" height="5"></rect>
                    </svg> </div>
                <div class="side-menu__title"> Services <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down side-menu__sub-icon">
                        <polyline points="6 9 12 15 18 9"></polyline>
                    </svg> </div>
            </a>
            <ul class="">
                <li>
                    <a href="<?= BASE_URL . 'best/add_services' ?>" class="side-menu">
                        <div class="side-menu__icon"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-activity">
                                <polyline points="22 12 18 12 15 21 9 3 6 12 2 12"></polyline>
                            </svg> </div>
                        <div class="side-menu__title"> Add New Service </div>
                    </a>
                </li>
                <li>
                    <a href="<?= BASE_URL . 'best/services' ?>" class="side-menu">
                        <div class="side-menu__icon"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-activity">
                                <polyline points="22 12 18 12 15 21 9 3 6 12 2 12"></polyline>
                            </svg> </div>
                        <div class="side-menu__title"> Services List </div>
                    </a>
                </li>

            </ul>
        </li>

        <li>
            <a href="#" class="side-menu side-menu">
                <div class="side-menu__icon"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users">
                        <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                        <circle cx="9" cy="7" r="4"></circle>
                        <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                        <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                    </svg> </div>
                <div class="side-menu__title"> Users </div>
            </a>

        </li>
        <li>
            <a href="#" class="side-menu side-menu">
                <div class="side-menu__icon"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-layout">
                        <rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect>
                        <line x1="3" y1="9" x2="21" y2="9"></line>
                        <line x1="9" y1="21" x2="9" y2="9"></line>
                    </svg> </div>
                <div class="side-menu__title"> Pages <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down side-menu__sub-icon">
                        <polyline points="6 9 12 15 18 9"></polyline>
                    </svg> </div>
            </a>
            <ul class="">

                <a href="#" class="side-menu side-menu">
                    <div class="side-menu__icon"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-activity">
                            <polyline points="22 12 18 12 15 21 9 3 6 12 2 12"></polyline>
                        </svg> </div>
                    <div class="side-menu__title"> Warranty </div>
                </a>
        </li>
        <li>
            <a href="#" class="side-menu">
                <div class="side-menu__icon"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-activity">
                        <polyline points="22 12 18 12 15 21 9 3 6 12 2 12"></polyline>
                    </svg> </div>
                <div class="side-menu__title"> FAQ </div>
            </a>
        </li>
        <li>
            <a href="login-light-login.html" class="side-menu">
                <div class="side-menu__icon"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-activity">
                        <polyline points="22 12 18 12 15 21 9 3 6 12 2 12"></polyline>
                    </svg> </div>
                <div class="side-menu__title"> About Us </div>
            </a>
        </li>
        <li>
            <a href="login-light-register.html" class="side-menu">
                <div class="side-menu__icon"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-activity">
                        <polyline points="22 12 18 12 15 21 9 3 6 12 2 12"></polyline>
                    </svg> </div>
                <div class="side-menu__title"> Contact </div>
            </a>
        </li>
        <li>
            <a href="main-light-error-page.html" class="side-menu">
                <div class="side-menu__icon"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-activity">
                        <polyline points="22 12 18 12 15 21 9 3 6 12 2 12"></polyline>
                    </svg> </div>
                <div class="side-menu__title"> Error Page </div>
            </a>
        </li>
    </ul>
    </li>
    </ul>
</nav>