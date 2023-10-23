@extends('back.layout')

<div class="main-wrapper">
    <nav class="navbar-vertical-nav d-none d-xl-block ">
    </nav>
    <nav class="navbar-vertical-nav offcanvas offcanvas-start navbar-offcanvac" tabindex="-1" id="offcanvasExample">
    </nav>

    <main class="main-content-wrapper">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row mb-8">
                <div class="col-md-12">
                    <div class="d-md-flex justify-content-between align-items-center">
                        <!-- page header -->
                        <div>
                            <h2>Show User</h2>
                            <!-- breadcrumb -->
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb mb-0">
                                    <li><a href="#" class="text-inherit">Dashboard</a></li>
                                    <li><a href="#" class="text-inherit">/Users</a></li>
                                    <li>/Show</li>
                                </ol>
                            </nav>
                        </div>
                        <!-- button -->
                        <div>
                            <a href="{{ route('users.index') }}" class="btn btn-light">Back to Users</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- row -->
            <div class="row">
                <div class="col-lg-8 col-12">
                    <!-- card -->
                    <div class="card mb-6 card-lg">
                        <!-- card body -->
                        <div class="card-body p-6">
                            <h4 class="mb-4 h5">User Information</h4>
                            <div class="row">
                                <div class="column" style="float: left; width:50%">
                                    <div>
                                        <label class="form-label">Name</label>
                                        <span>{{ $user->name }}</span>
                                    </div>
                                    <div>
                                        <label class="form-label">Email</label>
                                        <span>{{ $user->email }}</span>
                                    </div>
                                    <div>
                                        <label class="form-label">Role</label>
                                        <span>{{ $user->role }}</span>
                                    </div>
                                    <div>
                                        <label class="form-label">Email Verified</label>
                                        <span>{{ $user->email_verified_at ? 'Yes' : 'No' }}</span>
                                    </div>
                                    <div>
                                        <label class="form-label">Created at</label>
                                        <span>{{ $user->created_at->format('d M Y') }}</span>
                                    </div>
                                </div>
                                <div class="column" style="float: left; width:50%">
                                    <!-- Additional details can be added here -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</div>
