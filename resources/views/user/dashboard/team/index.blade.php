@extends('user.layout.app')
@section('title')
    Dashboard
@endsection

@section('head')
    <style>
        body {
            font-family: sans-serif;
            font-size: 15px;
        }

        .tree ul {
            position: relative;
            padding: 1em 0;
            white-space: nowrap;
            margin: 0 auto;
            text-align: center;
        }

        .tree ul::after {
            content: '';
            display: table;
            clear: both;
        }

        .tree li {
            display: inline-block;
            vertical-align: top;
            text-align: center;
            list-style-type: none;
            position: relative;
            padding: 1em 0.5em 0 0.5em;
        }

        .tree li::before,
        .tree li::after {
            content: '';
            position: absolute;
            top: 0;
            right: 50%;
            border-top: 1px solid #ccc;
            width: 50%;
            height: 1em;
        }

        .tree li::after {
            right: auto;
            left: 50%;
            border-left: 1px solid #ccc;
        }

        .tree li:only-child::after,
        .tree li:only-child::before {
            display: none;
        }

        .tree li:only-child {
            padding-top: 0;
        }

        .tree li:first-child::before,
        .tree li:last-child::after {
            border: 0 none;
        }

        .tree li:last-child::before {
            border-right: 1px solid #ccc;
            border-radius: 0 5px 0 0;
        }

        .tree li:first-child::after {
            border-radius: 5px 0 0 0;
        }

        .tree ul ul::before {
            content: '';
            position: absolute;
            top: 0;
            left: 50%;
            border-left: 1px solid #ccc;
            width: 0;
            height: 1em;
        }

        .tree li a {
            border: 1px solid #ccc;
            padding: 0.5em 0.75em;
            text-decoration: none;
            display: inline-block;
            border-radius: 5px;
            color: #333;
            position: relative;
            top: 1px;
        }

        .tree li a:hover,
        .tree li a:hover+ul li a {
            background: #e9453f;
            color: #fff;
            border: 1px solid #e9453f;
        }

        .tree li a:hover+ul li::after,
        .tree li a:hover+ul li::before,
        .tree li a:hover+ul::before,
        .tree li a:hover+ul ul::before {
            border-color: #e9453f;
        }

    </style>
@endsection

@section('content')
    <div id="content" class="app-content">
        <div class="row">
            <div class="col-12">
                <a class="btn btn-outline-theme btn-lg active" href="{{ url()->previous() }}"> Go Back</a>
            </div>
        </div>
        <br>
        <div class="card">
            <div class="card-body" style="overflow: scroll;">
                <div class="tree">
                    <ul>
                        <li>
                            <a href="#" class="text-white ">
                                <img class="rounded-square" width="150" src="{{ asset('assets/profile/' . $user->profile) }}"
                                    alt="User Avatar">
                                <br>
                                {{ $user->username }}
                            </a>
                            <ul>
                                <x-tree :user="$user" />
                            </ul>
                        </li>
                    </ul>

                </div>
            </div>
        </div>
    @endsection
