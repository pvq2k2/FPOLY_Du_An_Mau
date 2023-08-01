<?php include_once "../../Global.php"; ?>
<main class="relative h-full rounded-xl transition-all duration-200 w-full mt-4 mx-6">
    <nav class="flex flex-wrap items-center justify-between px-0 py-2 transition-all duration-250 rounded-2xl sticky top-[3%] left-0 right-0 backdrop-saturate-[200%] backdrop-blur-[30px] bg-[hsla(0,0%,100%,0.8)] shadow-xl z-50">
        <div class="flex items-center justify-between w-full px-4 py-1 mx-auto flex-wrap-inherit">

            <div class="flex items-center">
                <div class="relative flex flex-wrap items-stretch w-full transition-all rounded-lg">
                    <span class="text-xl leading-5 absolute z-50 -ml-px flex h-full items-center whitespace-nowrap rounded-lg rounded-tr-none rounded-br-none border border-r-0 border-transparent bg-transparent py-2 px-2.5 text-center font-normal text-slate-500 transition-all">
                        <ion-icon name="search-outline"></ion-icon>
                    </span>
                    <input type="text" class="pl-8 text-sm focus:shadow-soft-primary-outline w-[300px] leading-5 relative block min-w-0 flex-auto rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding py-2 pr-3 text-gray-700 transition-all placeholder:text-gray-500 focus:border-orange-300 focus:outline-none focus:transition-shadow" placeholder="Type here...">
                </div>
            </div>

            <div class="flex items-center mt-2 sm:mt-0 sm:mr-6 md:mr-0 lg:flex lg:basis-auto">
                <ul class="flex flex-row justify-end pl-0 mb-0 list-none md-max:w-full">

                    <li class="relative flex items-center pr-2">
                        <p class="hidden transform-dropdown-show"></p>
                        <a href="javascript:;" class="block p-0 transition-all text-xl ease-nav-brand text-slate-500" dropdown-trigger="" aria-expanded="false">
                            <ion-icon name="notifications-outline"></ion-icon>
                        </a>
                        <!-- <ul dropdown-menu="" class="text-sm transform-dropdown before:font-awesome before:leading-default before:duration-350 before:ease-soft lg:shadow-soft-3xl duration-250 min-w-44 before:sm:right-7.5 before:text-5.5 pointer-events-none absolute right-0 top-0 z-50 origin-top list-none rounded-lg border-0 border-solid border-transparent bg-white bg-clip-padding px-2 py-4 text-left text-slate-500 opacity-0 transition-all before:absolute before:right-2 before:left-auto before:top-0 before:z-50 before:inline-block before:font-normal before:text-white before:antialiased before:transition-all before:content-['\f0d8'] sm:-mr-6 lg:absolute lg:right-0 lg:left-auto lg:mt-2 lg:block lg:cursor-pointer">

                            <li class="relative mb-2">
                                <a class="ease-soft py-1.2 clear-both block w-full whitespace-nowrap rounded-lg bg-transparent px-4 duration-300 hover:bg-gray-200 hover:text-slate-700 lg:transition-colors" href="javascript:;">
                                    <div class="flex py-1">
                                        <div class="my-auto">
                                            <img src="../assets/img/team-2.jpg" class="inline-flex items-center justify-center mr-4 text-white text-sm h-9 w-9 max-w-none rounded-xl">
                                        </div>
                                        <div class="flex flex-col justify-center">
                                            <h6 class="mb-1 font-normal leading-normal text-sm"><span class="font-semibold">New message</span> from Laur</h6>
                                            <p class="mb-0 leading-tight text-xs text-slate-400">
                                                <i class="mr-1 fa fa-clock" aria-hidden="true"></i>
                                                13 minutes ago
                                            </p>
                                        </div>
                                    </div>
                                </a>
                            </li>
                        </ul> -->
                    </li>

                    <li id="toggleModalUser" class="relative">
                        <img class="w-10 h-10 rounded-full" src="https://res.cloudinary.com/assignmentjs/image/upload/v1664199286/nextjsuser/dw1r1yybpmahpl8qwmkb.png" alt="">


                        <div id="boxList" class="absolute top-16 bg-white shadow-xl z-20 p-3 rounded-lg ease-linear duration-300 w-60 xl:left-[-183px] lg:right-[-96px]  group-hover:visible
                                    before:absolute before:-top-2 xl:before:left-48 before:lg:left-[120px]
                                    before:w-5 before:h-5 before:bg-white before:rounded before:rotate-45 before:z-10 
                                    hidden backdrop-saturate-[200%] backdrop-blur-[30px] bg-[hsla(0,0%,100%,0.8)]">
                            <div>
                                <div class="items-center pb-3 w-full">
                                    <div class="ml-4">
                                        <div class="text-sm text-gray-500">
                                            Xin chào !
                                        </div>
                                        <div>
                                            <span class="user-name text-base font-medium text-gray-900"><?= $_SESSION['user']['ho_va_ten'] ?></span>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <a href="<?= $ROOT_URL ?>index.php" class="rounded-lg  hover:bg-gradient-to-tl from-[#4ba3e7] to-[#0f4670] hover:shadow-xl transition duration-150 ease-out hover:ease-in inline-block w-full p-3 text-black font-semibold cursor-pointer hover:text-white">
                                        Về trang chủ
                                    </a>
                                    <a href="<?= $ROOT_URL ?>index.php?act=logout" class="rounded-lg  hover:bg-gradient-to-tl from-[#4ba3e7] to-[#0f4670] hover:shadow-xl transition duration-150 ease-out hover:ease-in inline-block w-full p-3 text-black font-semibold cursor-pointer hover:text-white">
                                        Đăng xuất
                                    </a>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>

        </div>
    </nav>

    <script>
        $(document).ready(function() {
            $("#toggleModalUser").on("click", function() {
                $("#boxList").toggleClass("hidden"); // Toggle lớp hidden để hiển thị/ẩn #box
            });
        });
    </script>