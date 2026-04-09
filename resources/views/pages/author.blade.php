@extends('layouts.layout')
@section('title', 'Author')

@section('content')

    <div class="heading-page header-text">
        <section class="page-heading">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="text-content">
                            <h4>About Me</h4>
                            <h2>Author</h2>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <section class="blog-posts">
        <div class="container">
            <div class="row">

                <div class="col-lg-8">
                    <div class="author-box">
                        <div class="author-image-wrap">
                            <img src="{{ asset('assets/images/author.jpeg') }}" alt="author" class="author-image">
                        </div>

                        <div class="author-content">
                            <h3>Zorka Grčić</h3>
                            <p>Index: 53/22</p>
                            <span class="author-role">Web Programming Student</span>

                            <p>
                                I am a web programming student passionate about creating modern and responsive websites.
                            </p>

                            <p>
                                This blog was created as a project to showcase my knowledge and creativity in building dynamic web applications.
                                It focuses on interior design inspiration and modern aesthetics.
                            </p>


                        </div>
                    </div>
                </div>

                <!-- SIDEBAR -->
                <div class="col-lg-4">
                    <div class="sidebar">

                        <div class="sidebar-item categories">
                            <div class="sidebar-heading">
                                <h2>Skills</h2>
                            </div>
                            <div class="content">
                                <ul>
                                    <li>HTML / CSS</li>
                                    <li>JavaScript / jQuery</li>
                                    <li>Laravel / PHP</li>
                                    <li>Responsive Design</li>
                                </ul>
                            </div>
                        </div>



                    </div>
                </div>

            </div>
        </div>
    </section>

@endsection
