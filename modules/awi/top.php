
<?
$_url = $this->_Http->_get_url();

?>
<div id="wrapper" class="boxed-layout">
        <!-- START Template Canvas -->
        <div id="canvas">
           

            <!-- START Template Header -->
            <header id="header">

                <!-- START Logo -->
                <div class="logo hidden-phone hidden-tablet">
                    <a href="#">Manager</a>
                </div>
                <!--/ END Logo -->

                <!-- START Toolbar -->
                <ul class="toolbar" id="toolbar">

                    <!-- START Profile -->
                    <li class="profile">
                        <a href="#" data-toggle="dropdown">
                            <span class="avatar"><img src="/system/awi/img/user.png" alt=""></span>
                            <span class="text hidden-phone">GHOST<span class="role">Admin</span></span>
                            <span class="arrow icone-caret-down"></span>
                        </a>
                        <!-- START Dropdown Menu -->
                        <div class="dropdown-menu" role="menu">
                            <header>
                                My Profile 
                                <ul class="toolbar">
                                    <li><a href="#" class="btn btn-small"><span class="icon icone-pencil"></span></a></li>
                                    <li><a href="#" class="btn btn-small"><span class="icon icone-cog"></span></a></li>
                                </ul>
                            </header>

                            <footer>
                                <a href="?pg=admin&check=out" class="text"><span class="icon icone-off"></span> Sign Off</a>
                            </footer>
                        </div>
                        <!--/ END Dropdown Menu -->
                    </li>
                    <!--/ END Profile -->

                </ul>
                <!--/ END Toolbar -->
            </header>
            <!--/ END Template Header -->

            <!-- START Template Sidebar -->
            <aside id="sidebar">
                <!-- START Sidebar Content -->
                <div class="sidebar-content">
                    <!-- START Sidebar Tab -->
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#tab-menu" data-toggle="tab"><span class="icon icone-file"></span></a></li>

                    </ul>
                    <!--/ END Sidebar Tab -->

                    <!-- START Tab Content -->
                    <div class="tab-content">
                        <!-- START Tab Pane(menu) -->
                        <div class="tab-pane active" id="tab-menu">
                            <!-- START Sidebar Menu -->
                            <nav id="nav" class="accordion">
                                <ul id="navigation">
                                    <!-- START Menu Divider -->
                                    <li class="divider">Main Menu</li>
                                    <!--/ END Menu Divider -->

                                    <!-- START Menu -->

                                    <!--/ END Menu -->

									<!-- START Menu -->
                                    <li class="accordion-group <?$_url[1][1] == "board"?$this->_Templet->_o_put("active"):"";?>">
                                        <a data-toggle="collapse" data-parent="#navigation" href="#submenu3">
                                            <span class="icon icone-th-list"></span>
                                            <span class="text">Board</span>
                                            <span class="arrow icone-caret-down"></span>
                                        </a>
                                        <!-- START Submenu Menu -->
                                        <ul id="submenu3" class="collapse <?$_url[1][1] == "board"?$this->_Templet->_o_put("in"):"";?>">
                                            <li class="<?$_url[2][1] == "1"?$this->_Templet->_o_put("active"):"";?>"><a href="?pg=admin&type=board&sub_id=1&page=1"><span class="icon icone-angle-right"></span> travel</a></li>
                                            <li class="<?$_url[2][1] == "2"?$this->_Templet->_o_put("active"):"";?>"><a href="?pg=admin&type=board&sub_id=2&page=1"><span class="icon icone-angle-right"></span> novel</a></li>
                                            <li class="<?$_url[2][1] == "3"?$this->_Templet->_o_put("active"):"";?>"><a href="?pg=admin&type=board&sub_id=3&page=1"><span class="icon icone-angle-right"></span> artifice</a></li>
                                            <li class="<?$_url[2][1] == "4"?$this->_Templet->_o_put("active"):"";?>"><a href="?pg=admin&type=board&sub_id=4&page=1"><span class="icon icone-angle-right"></span> Business</a></li>
                                        </ul>
                                        <!--/ END Submenu Menu -->
                                    </li>
                                    <!--/ END Menu -->

                                    <!-- START Menu -->
                                    <li class="accordion-group <?$_url[1][1] == "media"?$this->_Templet->_o_put("active"):"";?>">
                                        <a data-toggle="collapse" data-parent="#navigation" href="#submenu2">
                                            <span class="icon icone-facetime-video"></span>
                                            <span class="text">media</span>
                                            <span class="arrow icone-caret-down"></span>
                                        </a>
                                        <!-- START Submenu Menu -->
                                        <ul id="submenu2" class="collapse <?$_url[1][1] == "media"?$this->_Templet->_o_put("in"):"";?>">
                                            <li class="<?$_url[2][1] == "1"?$this->_Templet->_o_put("active"):"";?>"><a href="?pg=admin&type=media&sub_id=1&page=1"><span class="icon icone-angle-right"></span> video</a></li>
                                            <li class="<?$_url[2][1] == "2"?$this->_Templet->_o_put("active"):"";?>"><a href="?pg=admin&type=media&sub_id=2&page=1"><span class="icon icone-angle-right"></span> music</a></li>
                                            <li class="<?$_url[2][1] == "3"?$this->_Templet->_o_put("active"):"";?>"><a href="?pg=admin&type=media&sub_id=3&page=1"><span class="icon icone-angle-right"></span> image</a></li>

                                        </ul>
                                        <!--/ END Submenu Menu -->
                                    </li>
                                    <!--/ END Menu -->

                                    <!-- START Menu -->
                                    <li class="accordion-group <?$_url[1][1] == "info"?$this->_Templet->_o_put("active"):"";?>">
                                        <a data-toggle="collapse" data-parent="#navigation" href="#submenu4">
                                            <span class="icon icone-user"></span>
                                            <span class="text">user</span>
                                            <span class="arrow icone-caret-down"></span>
                                        </a>
                                        <!-- START Submenu Menu -->
                                        <ul id="submenu4" class="collapse <?$_url[1][1] == "info"?$this->_Templet->_o_put("in"):"";?>">
                                            <li class="<?$_url[2][1] == "1"?$this->_Templet->_o_put("active"):"";?>"><a href="?pg=admin&type=info&sub_id=1&page=1"><span class="icon icone-angle-right"></span> list & edit & remove</a></li>

                                        </ul>
                                        <!--/ END Submenu Menu -->
                                    </li>
                                    <!--/ END Menu -->

                                    <!-- START Menu -->
                                    <li class="accordion-group <?$_url[1][1] == "chart"?$this->_Templet->_o_put("active"):"";?>">
                                        <a data-toggle="collapse" data-parent="#navigation" href="#submenu8">
                                            <span class="icon icone-bar-chart"></span>
                                            <span class="text">Chart</span>
                                            <span class="arrow icone-caret-down"></span>
                                        </a>
                                        <!-- START Submenu Menu -->
                                        <ul id="submenu8" class="collapse <?$_url[1][1] == "chart"?$this->_Templet->_o_put("in"):"";?>">
                                            <li class="<?$_url[2][1] == "1"?$this->_Templet->_o_put("active"):"";?>"><a href="?pg=admin&type=chart&sub_id=1"><span class="icon icone-angle-right"></span> Chart</a></li>
                                            <li class="<?$_url[2][1] == "2"?$this->_Templet->_o_put("active"):"";?>"><a href="?pg=admin&type=chart&sub_id=2"><span class="icon icone-angle-right"></span> Statistic</a></li>
                                        </ul>
                                        <!--/ END Submenu Menu -->
                                    </li>
                                    <!--/ END Menu -->
                                    
                                    <!-- START Menu Divider -->
                                    <li class="divider">Other Stuff</li>
                                    <!--/ END Menu Divider -->
                                </ul>
                            </nav>
                            <!--/ END Sidebar Menu -->
                        </div>
                        <!--/ END Tab Pane(menu) -->

                        
                    </div>
                    <!--/ END Tab Content -->
                </div>
                <!--/ END Sidebar Content -->
            </aside>
            <!--/ END Template Sidebar -->
