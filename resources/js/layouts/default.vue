<template>
  <div v-if="isLoggedIn">
    <div id="container" class="effect aside-float aside-bright mainnav-lg">

      <!--NAVBAR-->
      <!--===================================================-->
      <header id="navbar">
        <div id="navbar-container" class="boxed">

          <!--Brand logo & name-->
          <!--================================-->
          <div class="navbar-header">
            <a href="index.html" class="navbar-brand">
              <img src="/uploads/logo/logo_smk.png" style="height: 43px; width: 43px; margin-top: 8px; margin-left: 10px" alt="Nifty Logo" class="brand-icon">
              <div class="brand-title">
                <span class="brand-text">Absensi IoT</span>
              </div>
            </a>
          </div>
          <!--================================-->
          <!--End brand logo & name-->


          <!--Navbar Dropdown-->
          <!--================================-->
          <div class="navbar-content">
            <ul class="nav navbar-top-links">

              <!--Navigation toogle button-->
              <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
              <li class="tgl-menu-btn">
                <a class="mainnav-toggle" href="#">
                  <i class="demo-pli-list-view"></i>
                </a>
              </li>
              <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
              <!--End Navigation toogle button-->



              <!--Search-->
              <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
              <li>
                        <span style="text-align: left; padding-top: 15px; font-size: 16px; color: white; display: block;">Tahun Ajaran: <span class="badge badge-default">{{ info.tahun_ajaran }} Semester {{ info.semester }}</span></span>
              </li>
              <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
              <!--End Search-->

            </ul>
            <ul class="nav navbar-top-links">

              <!--Notification dropdown-->
              <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
              <li class="dropdown">
                <a href="#" data-toggle="dropdown" class="dropdown-toggle">
                  <i class="demo-pli-bell"></i>
                  <span class="badge badge-header badge-danger"></span>
                </a>


                <!--Notification dropdown menu-->
                <div class="dropdown-menu dropdown-menu-md dropdown-menu-right">
                  <div class="nano scrollable">
                    <div class="nano-content">
                      <ul class="head-list">
                        <li>
                          <a href="#" class="media add-tooltip" data-title="Used space : 95%" data-container="body"
                            data-placement="bottom">
                            <div class="media-left">
                              <i class="demo-pli-data-settings icon-2x text-main"></i>
                            </div>
                            <div class="media-body">
                              <p class="text-nowrap text-main text-semibold">HDD is full</p>
                              <div class="progress progress-sm mar-no">
                                <div style="width: 95%;" class="progress-bar progress-bar-danger">
                                  <span class="sr-only">95% Complete</span>
                                </div>
                              </div>
                            </div>
                          </a>
                        </li>
                        <li>
                          <a class="media" href="#">
                            <div class="media-left">
                              <i class="demo-pli-file-edit icon-2x"></i>
                            </div>
                            <div class="media-body">
                              <p class="mar-no text-nowrap text-main text-semibold">Write a news article</p>
                              <small>Last Update 8 hours ago</small>
                            </div>
                          </a>
                        </li>
                        <li>
                          <a class="media" href="#">
                            <span class="label label-info pull-right">New</span>
                            <div class="media-left">
                              <i class="demo-pli-speech-bubble-7 icon-2x"></i>
                            </div>
                            <div class="media-body">
                              <p class="mar-no text-nowrap text-main text-semibold">Comment Sorting</p>
                              <small>Last Update 8 hours ago</small>
                            </div>
                          </a>
                        </li>
                        <li>
                          <a class="media" href="#">
                            <div class="media-left">
                              <i class="demo-pli-add-user-star icon-2x"></i>
                            </div>
                            <div class="media-body">
                              <p class="mar-no text-nowrap text-main text-semibold">New User Registered</p>
                              <small>4 minutes ago</small>
                            </div>
                          </a>
                        </li>
                        <li>
                          <a class="media" href="#">
                            <div class="media-left">
                              <img class="img-circle img-sm" alt="Profile Picture" src="/img/profile-photos/9.png">
                            </div>
                            <div class="media-body">
                              <p class="mar-no text-nowrap text-main text-semibold">Lucy sent you a message</p>
                              <small>30 minutes ago</small>
                            </div>
                          </a>
                        </li>
                        <li>
                          <a class="media" href="#">
                            <div class="media-left">
                              <img class="img-circle img-sm" alt="Profile Picture" src="/img/profile-photos/3.png">
                            </div>
                            <div class="media-body">
                              <p class="mar-no text-nowrap text-main text-semibold">Jackson sent you a message</p>
                              <small>40 minutes ago</small>
                            </div>
                          </a>
                        </li>
                      </ul>
                    </div>
                  </div>

                  <!--Dropdown footer-->
                  <div class="pad-all bord-top">
                    <a href="#" class="btn-link text-main box-block">
                      <i class="pci-chevron chevron-right pull-right"></i>Show All Notifications
                    </a>
                  </div>
                </div>
              </li>
              <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
              <!--End notifications dropdown-->



              <!--User dropdown-->
              <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
              <li id="dropdown-user" class="dropdown">
                <a href="#" data-toggle="dropdown" class="dropdown-toggle text-right">
                  <span class="ic-user pull-right">
                    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                    <!--You can use an image instead of an icon.-->
                    <!--<img class="img-circle img-user media-object" src="/img/profile-photos/1.png" alt="Profile Picture">-->
                    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                    <i class="demo-pli-male"></i>
                  </span>
                  <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                  <!--You can also display a user name in the navbar.-->
                  <!--<div class="username hidden-xs">Aaron Chavez</div>-->
                  <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                </a>


                <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right panel-default">
                  <ul class="head-list">
                    <li>
                      <a href="#"><i class="demo-pli-male icon-lg icon-fw"></i> Profile</a>
                    </li>
                    <li>
                      <a href="#"><span class="badge badge-danger pull-right">9</span><i
                          class="demo-pli-mail icon-lg icon-fw"></i> Messages</a>
                    </li>
                    <li>
                      <a href="#"><span class="label label-success pull-right">New</span><i
                          class="demo-pli-gear icon-lg icon-fw"></i> Settings</a>
                    </li>
                    <li>
                      <a href="#"><i class="demo-pli-computer-secure icon-lg icon-fw"></i> Lock screen</a>
                    </li>
                    <li>
                      <a href="javascript:void(0)" v-on:click="logout()"><i class="demo-pli-unlock icon-lg icon-fw"></i> Logout</a>
                    </li>
                  </ul>
                </div>
              </li>
              <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
              <!--End user dropdown-->


              <li>
                <a href="#" class="aside-toggle">
                  <i class="demo-pli-dot-vertical"></i>
                </a>
              </li>
            </ul>
          </div>
          <!--================================-->
          <!--End Navbar Dropdown-->

        </div>
      </header>
      <!--===================================================-->
      <!--END NAVBAR-->

      <div class="boxed">

        <!--CONTENT CONTAINER-->
        <!--===================================================-->
        <div id="content-container">
          <div id="page-head">

            <!--Page Title-->
            <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
            <div id="page-title">
              <h1 class="page-header text-overflow" v-html="$route.meta.title"><br><small style="color: white">{{ $route.meta.sub_title }}</small></h1>
            </div>
            <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
            <!--End page title-->


            <!--Breadcrumb-->
            <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->

            <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
            <!--End breadcrumb-->

          </div>


          <!--Page content-->
          <!--===================================================-->
          <div id="page-content">

            <router-view></router-view>

          </div>
          <!--===================================================-->
          <!--End page content-->

        </div>
        <!--===================================================-->
        <!--END CONTENT CONTAINER-->



        <!--ASIDE-->
        <!--===================================================-->
        <aside id="aside-container">
          <div id="aside">
            <div class="nano">
              <div class="nano-content">

                <!--Nav tabs-->
                <!--================================-->
                <ul class="nav nav-tabs nav-justified">
                  <li class="active">
                    <a href="#demo-asd-tab-1" data-toggle="tab">
                      <i class="demo-pli-speech-bubble-7 icon-lg"></i>
                    </a>
                  </li>
                  <li>
                    <a href="#demo-asd-tab-2" data-toggle="tab">
                      <i class="demo-pli-information icon-lg icon-fw"></i> Report
                    </a>
                  </li>
                  <li>
                    <a href="#demo-asd-tab-3" data-toggle="tab">
                      <i class="demo-pli-wrench icon-lg icon-fw"></i> Settings
                    </a>
                  </li>
                </ul>
                <!--================================-->
                <!--End nav tabs-->



                <!-- Tabs Content -->
                <!--================================-->
                <div class="tab-content">

                  <!--First tab (Contact list)-->
                  <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                  <div class="tab-pane fade in active" id="demo-asd-tab-1">
                    <p class="pad-all text-main text-sm text-uppercase text-bold">
                      <span class="pull-right badge badge-warning">3</span> Family
                    </p>

                    <!--Family-->
                    <div class="list-group bg-trans">
                      <a href="#" class="list-group-item">
                        <div class="media-left pos-rel">
                          <img class="img-circle img-xs" src="/img/profile-photos/2.png" alt="Profile Picture">
                          <i class="badge badge-success badge-stat badge-icon pull-left"></i>
                        </div>
                        <div class="media-body">
                          <p class="mar-no text-main">Stephen Tran</p>
                          <small class="text-muteds">Availabe</small>
                        </div>
                      </a>
                      <a href="#" class="list-group-item">
                        <div class="media-left pos-rel">
                          <img class="img-circle img-xs" src="/img/profile-photos/7.png" alt="Profile Picture">
                        </div>
                        <div class="media-body">
                          <p class="mar-no text-main">Brittany Meyer</p>
                          <small class="text-muteds">I think so</small>
                        </div>
                      </a>
                      <a href="#" class="list-group-item">
                        <div class="media-left pos-rel">
                          <img class="img-circle img-xs" src="/img/profile-photos/1.png" alt="Profile Picture">
                          <i class="badge badge-info badge-stat badge-icon pull-left"></i>
                        </div>
                        <div class="media-body">
                          <p class="mar-no text-main">Jack George</p>
                          <small class="text-muteds">Last Seen 2 hours ago</small>
                        </div>
                      </a>
                      <a href="#" class="list-group-item">
                        <div class="media-left pos-rel">
                          <img class="img-circle img-xs" src="/img/profile-photos/4.png" alt="Profile Picture">
                        </div>
                        <div class="media-body">
                          <p class="mar-no text-main">Donald Brown</p>
                          <small class="text-muteds">Lorem ipsum dolor sit amet.</small>
                        </div>
                      </a>
                      <a href="#" class="list-group-item">
                        <div class="media-left pos-rel">
                          <img class="img-circle img-xs" src="/img/profile-photos/8.png" alt="Profile Picture">
                          <i class="badge badge-warning badge-stat badge-icon pull-left"></i>
                        </div>
                        <div class="media-body">
                          <p class="mar-no text-main">Betty Murphy</p>
                          <small class="text-muteds">Idle</small>
                        </div>
                      </a>
                      <a href="#" class="list-group-item">
                        <div class="media-left pos-rel">
                          <img class="img-circle img-xs" src="/img/profile-photos/9.png" alt="Profile Picture">
                          <i class="badge badge-danger badge-stat badge-icon pull-left"></i>
                        </div>
                        <div class="media-body">
                          <p class="mar-no text-main">Samantha Reid</p>
                          <small class="text-muteds">Offline</small>
                        </div>
                      </a>
                    </div>

                    <hr>
                    <p class="pad-all text-main text-sm text-uppercase text-bold">
                      <span class="pull-right badge badge-success">Offline</span> Friends
                    </p>

                    <!--Works-->
                    <div class="list-group bg-trans">
                      <a href="#" class="list-group-item">
                        <span class="badge badge-purple badge-icon badge-fw pull-left"></span> Joey K. Greyson
                      </a>
                      <a href="#" class="list-group-item">
                        <span class="badge badge-info badge-icon badge-fw pull-left"></span> Andrea Branden
                      </a>
                      <a href="#" class="list-group-item">
                        <span class="badge badge-success badge-icon badge-fw pull-left"></span> Johny Juan
                      </a>
                      <a href="#" class="list-group-item">
                        <span class="badge badge-danger badge-icon badge-fw pull-left"></span> Susan Sun
                      </a>
                    </div>


                    <hr>
                    <p class="pad-all text-main text-sm text-uppercase text-bold">News</p>

                    <div class="pad-hor">
                      <p>Lorem ipsum dolor sit amet, consectetuer
                        <a data-title="45%" class="add-tooltip text-semibold text-main" href="#">adipiscing elit</a>,
                        sed diam nonummy nibh. Lorem ipsum dolor sit amet.
                      </p>
                      <small><em>Last Update : Des 12, 2014</em></small>
                    </div>


                  </div>
                  <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                  <!--End first tab (Contact list)-->


                  <!--Second tab (Custom layout)-->
                  <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                  <div class="tab-pane fade" id="demo-asd-tab-2">

                    <!--Monthly billing-->
                    <div class="pad-all">
                      <p class="pad-ver text-main text-sm text-uppercase text-bold">Billing &amp; reports</p>
                      <p>Get <strong class="text-main">$5.00</strong> off your next bill by making sure your full
                        payment reaches us before August 5, 2018.</p>
                    </div>
                    <hr class="new-section-xs">
                    <div class="pad-all">
                      <span class="pad-ver text-main text-sm text-uppercase text-bold">Amount Due On</span>
                      <p class="text-sm">August 17, 2018</p>
                      <p class="text-2x text-thin text-main">$83.09</p>
                      <button class="btn btn-block btn-success mar-top">Pay Now</button>
                    </div>


                    <hr>

                    <p class="pad-all text-main text-sm text-uppercase text-bold">Additional Actions</p>

                    <!--Simple Menu-->
                    <div class="list-group bg-trans">
                      <a href="#" class="list-group-item"><i class="demo-pli-information icon-lg icon-fw"></i> Service
                        Information</a>
                      <a href="#" class="list-group-item"><i class="demo-pli-mine icon-lg icon-fw"></i> Usage
                        Profile</a>
                      <a href="#" class="list-group-item"><span class="label label-info pull-right">New</span><i
                          class="demo-pli-credit-card-2 icon-lg icon-fw"></i> Payment Options</a>
                      <a href="#" class="list-group-item"><i class="demo-pli-support icon-lg icon-fw"></i> Message
                        Center</a>
                    </div>


                    <hr>

                    <div class="text-center">
                      <div><i class="demo-pli-old-telephone icon-3x"></i></div>
                      Questions?
                      <p class="text-lg text-semibold text-main"> (415) 234-53454 </p>
                      <small><em>We are here 24/7</em></small>
                    </div>
                  </div>
                  <!--End second tab (Custom layout)-->
                  <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->


                  <!--Third tab (Settings)-->
                  <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                  <div class="tab-pane fade" id="demo-asd-tab-3">
                    <ul class="list-group bg-trans">
                      <li class="pad-top list-header">
                        <p class="text-main text-sm text-uppercase text-bold mar-no">Account Settings</p>
                      </li>
                      <li class="list-group-item">
                        <div class="pull-right">
                          <input class="toggle-switch" id="demo-switch-1" type="checkbox" checked>
                          <label for="demo-switch-1"></label>
                        </div>
                        <p class="mar-no text-main">Show my personal status</p>
                        <small class="text-muted">Lorem ipsum dolor sit amet, consectetuer adipiscing elit.</small>
                      </li>
                      <li class="list-group-item">
                        <div class="pull-right">
                          <input class="toggle-switch" id="demo-switch-2" type="checkbox" checked>
                          <label for="demo-switch-2"></label>
                        </div>
                        <p class="mar-no text-main">Show offline contact</p>
                        <small class="text-muted">Aenean commodo ligula eget dolor. Aenean massa.</small>
                      </li>
                      <li class="list-group-item">
                        <div class="pull-right">
                          <input class="toggle-switch" id="demo-switch-3" type="checkbox">
                          <label for="demo-switch-3"></label>
                        </div>
                        <p class="mar-no text-main">Invisible mode </p>
                        <small class="text-muted">Cum sociis natoque penatibus et magnis dis parturient montes, nascetur
                          ridiculus mus. </small>
                      </li>
                    </ul>


                    <hr>

                    <ul class="list-group pad-btm bg-trans">
                      <li class="list-header">
                        <p class="text-main text-sm text-uppercase text-bold mar-no">Public Settings</p>
                      </li>
                      <li class="list-group-item">
                        <div class="pull-right">
                          <input class="toggle-switch" id="demo-switch-4" type="checkbox" checked>
                          <label for="demo-switch-4"></label>
                        </div>
                        Online status
                      </li>
                      <li class="list-group-item">
                        <div class="pull-right">
                          <input class="toggle-switch" id="demo-switch-5" type="checkbox" checked>
                          <label for="demo-switch-5"></label>
                        </div>
                        Show offline contact
                      </li>
                      <li class="list-group-item">
                        <div class="pull-right">
                          <input class="toggle-switch" id="demo-switch-6" type="checkbox" checked>
                          <label for="demo-switch-6"></label>
                        </div>
                        Show my device icon
                      </li>
                    </ul>



                    <hr>

                    <p class="pad-hor text-main text-sm text-uppercase text-bold mar-no">Task Progress</p>
                    <div class="pad-all">
                      <p class="text-main">Upgrade Progress</p>
                      <div class="progress progress-sm">
                        <div class="progress-bar progress-bar-success" style="width: 15%;"><span
                            class="sr-only">15%</span></div>
                      </div>
                      <small>15% Completed</small>
                    </div>
                    <div class="pad-hor">
                      <p class="text-main">Database</p>
                      <div class="progress progress-sm">
                        <div class="progress-bar progress-bar-danger" style="width: 75%;"><span
                            class="sr-only">75%</span></div>
                      </div>
                      <small>17/23 Database</small>
                    </div>

                  </div>
                  <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                  <!--Third tab (Settings)-->

                </div>
              </div>
            </div>
          </div>
        </aside>
        <!--===================================================-->
        <!--END ASIDE-->


        <!--MAIN NAVIGATION-->
        <!--===================================================-->
        <nav id="mainnav-container">
          <div id="mainnav">


            <!--OPTIONAL : ADD YOUR LOGO TO THE NAVIGATION-->
            <!--It will only appear on small screen devices.-->
            <!--================================
                    <div class="mainnav-brand">
                        <a href="index.html" class="brand">
                            <img src="/img/logo.png" alt="Nifty Logo" class="brand-icon">
                            <span class="brand-text">Nifty</span>
                        </a>
                        <a href="#" class="mainnav-toggle"><i class="pci-cross pci-circle icon-lg"></i></a>
                    </div>
                    -->



            <!--Menu-->
            <!--================================-->
            <div id="mainnav-menu-wrap">
              <div class="nano">
                <div class="nano-content">

                  <!--Profile Widget-->
                  <!--================================-->
                  <div id="mainnav-profile" class="mainnav-profile">
                    <div class="profile-wrap text-center">
                      <div class="pad-btm">
                        <img class="img-circle img-md" src="/img/profile-photos/1.png" alt="Profile Picture">
                      </div>
                      <a href="#profile-nav" class="box-block" data-toggle="collapse" aria-expanded="false">
                        <span class="pull-right dropdown-toggle">
                          <i class="dropdown-caret"></i>
                        </span>
                        <p class="mnp-name">{{ user.name }}</p>
                        <span class="mnp-desc">{{ user.email }}</span>
                      </a>
                    </div>
                    <div id="profile-nav" class="collapse list-group bg-trans">
                      <a href="#" class="list-group-item">
                        <i class="demo-pli-male icon-lg icon-fw"></i> View Profile
                      </a>
                      <a href="#" class="list-group-item">
                        <i class="demo-pli-gear icon-lg icon-fw"></i> Settings
                      </a>
                      <a href="#" class="list-group-item">
                        <i class="demo-pli-information icon-lg icon-fw"></i> Help
                      </a>
                      <a href="#" class="list-group-item">
                        <i class="demo-pli-unlock icon-lg icon-fw"></i> Logout
                      </a>
                    </div>
                  </div>


                  <!--Shortcut buttons-->
                  <!--================================-->
                  <div id="mainnav-shortcut" class="hidden">
                    <ul class="list-unstyled shortcut-wrap">
                      <li class="col-xs-3" data-content="My Profile">
                        <a class="shortcut-grid" href="#">
                          <div class="icon-wrap icon-wrap-sm icon-circle bg-mint">
                            <i class="demo-pli-male"></i>
                          </div>
                        </a>
                      </li>
                      <li class="col-xs-3" data-content="Messages">
                        <a class="shortcut-grid" href="#">
                          <div class="icon-wrap icon-wrap-sm icon-circle bg-warning">
                            <i class="demo-pli-speech-bubble-3"></i>
                          </div>
                        </a>
                      </li>
                      <li class="col-xs-3" data-content="Activity">
                        <a class="shortcut-grid" href="#">
                          <div class="icon-wrap icon-wrap-sm icon-circle bg-success">
                            <i class="demo-pli-thunder"></i>
                          </div>
                        </a>
                      </li>
                      <li class="col-xs-3" data-content="Lock Screen">
                        <a class="shortcut-grid" href="#">
                          <div class="icon-wrap icon-wrap-sm icon-circle bg-purple">
                            <i class="demo-pli-lock-2"></i>
                          </div>
                        </a>
                      </li>
                    </ul>
                  </div>
                  <!--================================-->
                  <!--End shortcut buttons-->


                  <Sidebar></Sidebar>


                  <!--Widget-->
                  <!--================================-->
                  <div class="mainnav-widget">

                    <!-- Show the button on collapsed navigation -->
                    <div class="show-small">
                      <a href="#" data-toggle="menu-widget" data-target="#demo-wg-server">
                        <i class="demo-pli-monitor-2"></i>
                      </a>
                    </div>

                    <!-- Hide the content on collapsed navigation -->
                    <div id="demo-wg-server" class="hide-small mainnav-widget-content">
                      <ul class="list-group">
                        <li class="list-header pad-no mar-ver">Server Status</li>
                        <li class="mar-btm">
                          <span class="label label-primary pull-right">15%</span>
                          <p>CPU Usage</p>
                          <div class="progress progress-sm">
                            <div class="progress-bar progress-bar-primary" style="width: 15%;">
                              <span class="sr-only">15%</span>
                            </div>
                          </div>
                        </li>
                        <li class="mar-btm">
                          <span class="label label-purple pull-right">75%</span>
                          <p>Bandwidth</p>
                          <div class="progress progress-sm">
                            <div class="progress-bar progress-bar-purple" style="width: 75%;">
                              <span class="sr-only">75%</span>
                            </div>
                          </div>
                        </li>
                        <li class="pad-ver"><a href="#" class="btn btn-success btn-bock">View Details</a></li>
                      </ul>
                    </div>
                  </div>
                  <!--================================-->
                  <!--End widget-->

                </div>
              </div>
            </div>
            <!--================================-->
            <!--End menu-->

          </div>
        </nav>
        <!--===================================================-->
        <!--END MAIN NAVIGATION-->

      </div>



      <!-- FOOTER -->
      <!--===================================================-->
      <footer id="footer">

        <!-- Visible when footer positions are fixed -->
        <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
        <div class="show-fixed pad-rgt pull-right">
          You have <a href="#" class="text-main"><span class="badge badge-danger">3</span> pending action.</a>
        </div>



        <!-- Visible when footer positions are static -->
        <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
        <div class="hide-fixed pull-right pad-rgt">
          14GB of <strong>512GB</strong> Free.
        </div>



        <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
        <!-- Remove the class "show-fixed" and "hide-fixed" to make the content always appears. -->
        <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->

        <p class="pad-lft">&#0169; 2018 Your Company</p>



      </footer>
      <!--===================================================-->
      <!-- END FOOTER -->


      <!-- SCROLL PAGE BUTTON -->
      <!--===================================================-->
      <button class="scroll-top btn">
        <i class="pci-chevron chevron-up"></i>
      </button>
      <!--===================================================-->
    </div>
  </div>
  <div v-else>
    <Login />
  </div>
</template>

<script>
    import Sidebar from "../components/admin/Sidebar";
    import Login from "../pages/Login"

    import api_url from '../api_url'
    import headers from '../config/axios_header'

    import swal from 'sweetalert'

    export default {
    data: () => ({
        info: {},
    }),

    computed: {
        isLoggedIn: function () {
            return this.$store.getters.isLoggedIn
            // return false;
        },
        user: function () {
            return JSON.parse(localStorage.getItem('user'));
        }
    },
    mounted() {
        this.infoSekolah()
    },
    components: {
        Sidebar,
        Login
    },
    methods: {
        logout: function () {
            swal({
                title: "Anda Akan Keluar Aplikasi",
                text: "Logout perlu dilakukan apabila sudah tidak lagi menggukanan aplikasi. Hal ini bertujuan mencegah hal-hal yang tidak diinginkan",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((value) => {
                if (value) {
                    this.$store.dispatch('logout')
                        .then(() => {
                            this.$router.push('/login')
                            toastr.success('Berhasil Logout')
                        })
                } else {
                    swal("Batal Keluar Aplikasi");
                }
            });
        },

        infoSekolah: function()
        {
            var vm = this

            axios.get(api_url + '/api/info/data')
            .then(function (res) {
                vm.info = res.data
            })

        },
    }
};
</script>
