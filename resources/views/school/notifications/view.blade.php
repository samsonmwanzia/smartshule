@extends('layouts.school')

@section('content')
    <div id="content" class="app-content">
        <div class="row">

            <div class="col-xl-12">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">SCHOOL NOTIFICATIONS</a></li>
                </ul>
                <hr class="mb-4">

                <div class="card mt-2 p-3">
                    <div class="table-responsive">
                        <a href="{{ route('school.notification.readAll') }}"
                           class="mb-2 pull-right  btn btn-sm btn-success"><i
                                class="lnr lnr-sync"></i>Mark all as read</a>
                        <table id="example" class="table table-bordered table-striped table-hover">
                            <thead>
                            <th>ID</th>
                            <th>Sender</th>
                            <th>Subject</th>
                            <th>Description</th>
                            <th>Date</th>
                            </thead>
                            <tbody>
                            <?php $count = 1; ?>
                            @if($notifications->count() > 0)

                                @foreach($notifications as $notification)

                                    <tr style="@if($notification->read == false) background-color: #14dda5; color: #fff; @endif">
                                        <td>{{$count++}}</td>
                                        <td>
                                            <strong>
                                                @if($notification->sender_id == 0)
                                                    {{ env('APP_NAME').' SYSTEM' }}
                                                @else
                                                    {{ $user = (new \App\Http\Controllers\HomeController())->getNotifSender($notification->sender_id)->username }}
                                                @endif
                                            </strong>
                                        </td>
                                        <td>
                                            <strong>
                                                {{ $notification->subject  }}
                                            </strong>
                                        </td>
                                        <td>
                                            {{ (strlen($notification->message) > 60) ? substr($notification->message, 0, 60).'...' : $notification->message }}
                                        </td>
                                        <td>
                                                <span class="float-right">
													{{ $notification->updated_at->diffForHumans() }}
												</span>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <div class="col-md-12 alert alert-danger ">
                                    <p><strong>Whoops !!</strong> there no any records founds.</p>
                                </div>
                            @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

