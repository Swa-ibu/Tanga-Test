@extends('layouts.admin.index')
@section('title') {{ Auth::user()->name }} @endsection


@section('content')


<div class="content">
    <div class="page-header">
        <div class="page-title">
            <h4>Profile</h4>
            <h6>User Profile</h6>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <div class="profile-set">
                <div class="profile-head"></div>
                <div class="profile-top">
                    <div class="profile-content">
                        <div class="profile-contentimg">
                            @if (Auth::user()->featured_image == 'default.png')
                                <img src="{{ asset('admin/assets/img/icons/default.png') }}" alt="{{ Auth::user()->name }}">
                            @else
                                <img src="{{ Storage::disk('public')->url('user/'.Auth::user()->featured_image) }}" alt="{{ Auth::user()->name }}">
                            @endif
                            <div class="profileupload">
                                <a href="javascript:void(0);">
                                    <img src="{{ asset('admin/assets/img/icons/edit-set.svg') }}" alt="img">
                                </a>
                            </div>
                        </div>
                        <div class="profile-contentname">
                            <h2>{{ Auth::user()->name }} @ {{ Auth::user()->email }}</h2>
                            <h4>Updates Your Photo and Personal Details.</h4>
                        </div>
                    </div>
            <form action="
                        @if (Auth::user()->role_id == 1)
                                {{ route('admin.update-profile') }}
                        @elseif(Auth::user()->role_id == 2)
                                {{ route('teacher.update-profile') }}
                        @else
                                {{ route('student.update-profile') }}
                        @endif"
                        method="post" enctype="multipart/form-data">
                @csrf



                    <div class="ms-auto">
                        <button type="submit" class="btn btn-submit me-2">Update</button>
                        @if (Auth::user()->role_id == 1)
                            <a href="{{ route('admin.dashboard') }}" class="btn btn-cancel">Cancel</a>
                        @elseif (Auth::user()->role_id == 2)
                            <a href="{{ route('teacher.dashboard') }}" class="btn btn-cancel">Cancel</a>
                        @else
                            <a href="{{ route('student.dashboard') }}" class="btn btn-cancel">Cancel</a>
                        @endif
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6 col-sm-12">
                    <div class="form-group">
                        <label>Full Name</label>
                        <input type="text" placeholder="{{ Auth::user()->name }}" value="{{ Auth::user()->name }}" name="name">
                    </div>
                    <div class="row my-sm-2 my-md-3 mt-lg-5">
                        <div class="col-lg-6 col-sm-12">
                            <div class="form-group">
                                <label for="email">Email <span class="text-muted fst-italic">(Verified)</span></label>
                                <input type="email" placeholder="{{ Auth::user()->email }}" value="{{ Auth::user()->email }}" readonly class="form-control">
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-12">
                            <div class="form-group">
                                <label for="profile_photo">Profile Photo</label>
                                <input type="file" name="image" class="form-control">
                            </div>
                        </div>
                       </div>
                </div>
                <div class="col-lg-6 col-sm-12">
                    <div class="form-group">
                        <label for="about">Tell us about yourself</label>
                        <textarea name="about" id="about" class="form-control" rows="10">{{ Auth::user()->about }}</textarea>
                    </div>
                </div>
            </div>

                <div class="col-12">
                    <button type="submit" class="btn btn-submit me-2">Update</button>
                    @if (Auth::user()->role_id == 1)
                        <a href="{{ route('admin.dashboard') }}" class="btn btn-cancel">Cancel</a>
                    @elseif (Auth::user()->role_id == 2)
                        <a href="{{ route('teacher.dashboard') }}" class="btn btn-cancel">Cancel</a>
                    @else
                        <a href="{{ route('student.dashboard') }}" class="btn btn-cancel">Cancel</a>
                    @endif
                </div>
            </div>
        </form>
        </div>
    </div>
</div>


@endsection
