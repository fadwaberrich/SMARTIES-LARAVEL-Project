@extends('back.layout')

<div class="main-wrapper">


    <nav class="navbar-vertical-nav d-none d-xl-block ">

    </nav>

  
<main class="main-content-wrapper">
    <main class="main-content-wrapper">
        <div class="container">
            <div class="row mb-8">
                <div class="col-md-12">
                    <!-- page header -->
                    <div class="d-md-flex justify-content-between align-items-center">
                        <div>
                            <h2>Users</h2>
                            <!-- breadcrumb -->
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb mb-0">
                                    <li><a href="#" class="text-inherit">Dashboard</a></li>
                                    <li>/Users</li>
                                </ol>
                            </nav>
                        </div>
                        <!-- button -->
                       
                    </div>
                </div>
            </div>
            <!-- row -->
            <div class="row ">
                <div class="col-xl-12 col-12 mb-5">
                    <!-- card -->
                    <div class="card h-100 card-lg">
                        <div class="px-6 py-6 ">
                            <div class="row justify-content-between">
                                <!-- form -->
                                <div class="col-lg-4 col-md-6 col-12 mb-2 mb-lg-0">
                                    <form class="d-flex" role="search">
                                        <input class="form-control" type="search" placeholder="Search Users"
                                            aria-label="Search">
                                    </form>
                                </div>
                                <!-- select option -->
                               
                            </div>
                        </div>
                        <!-- card body -->
                        <div class="card-body p-0">
                            <!-- table -->
                            <div class="table-responsive">
                                <table
                                    class="table table-centered table-hover text-nowrap table-borderless mb-0 table-with-checkbox">
                                    <thead class="bg-light">
                                        <tr>
                                           
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Role</th>
                                            <th>Email Verified</th>
                                            <th>Created at</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($users as $user)
                                            <tr>
                                                
                                                <td><a href="{{ route('users.show', $user) }}"
                                                        class="text-reset">{{ $user->name }}</a></td>
                                                <td>{{ $user->email }}</td>
                                                <td>{{ $user->role }}</td>
                                                <td>{{ $user->email_verified_at ? 'Yes' : 'No' }}</td>
                                                <td>{{ $user->created_at->format('d M Y') }}</td>
                                                <td>
                                                    <div>
                                                        <li>
                                                            <form action="{{ route('users.destroy', $user) }}"
                                                                method="POST">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" class="dropdown-item"><i
                                                                        class="bi bi-trash me-3"></i>Delete</button>
                                                            </form>
                                                        </li>
                                                      
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

</main>

</div>