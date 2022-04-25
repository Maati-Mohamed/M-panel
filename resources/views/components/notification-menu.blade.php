<div class="notification ms-3">
    <a href="" data-bs-toggle="dropdown" aria-expanded="false" class="position-relative">
        <i class="bi bi-bell-fill fs-4"></i>
        @if($new != 0)
        <span class="badge bg-danger position-absolute bottom-100 start-50">{{ $new }}</span>
        @endif
    </a>
    <ul class="dropdown-menu dropdown-menu-end">
        @foreach($notifications as $notification)
        <a href="{{ $notification->data['url'] }}?notifiy_id={{ $notification->id }}">
            <div class="noty d-flex justify-content-between p-2 gap-3">
                <div class="profile-photo">
                    <img src="{{ asset('photo/'.$notification->data['image']) }}" alt="noty">
                </div>
                <div class="details">
                    <p>{{ $notification->data['body'] }}
                    @if($notification->unread()) <span class="text-danger">*</span> @endif
                    </p>
                    <h4 class="text-muted d-inline-block">{{ $notification->created_at->diffForHumans() }}
                        <i class="bi bi-clock"></i>
                    </h4>
                </div>
            </div>
        </a>
        @endforeach
    </ul>


</div>