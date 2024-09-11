@extends('layouts.admin')

@section('content')
<div class="container mt-4">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="mb-0"> النشاطات</h4>
                </div>
                <div class="card-body">
                    @foreach ($activities as $activitiesItem)
                        <div class="card mb-4">
                            <div class="card-body">
                                <h5 class="card-title">{{ $activitiesItem->title }}</h5>
                                <p class="card-text">
                                    <span class="short-description">{{ Str::limit($activitiesItem->description, 200) }}</span>
                                    <span class="full-description" style="display: none;">{{ $activitiesItem->description }}</span>
                                    @if (strlen($activitiesItem->description) > 200)
                                        <a href="#" class="read-more" data-news-id="{{ $activitiesItem->id }}">قراءة المزيد</a>
                                    @endif
                                </p>
                                <div class="text-center mt-3">
                                    <img src="{{ asset('storage/' . $activitiesItem->photo) }}" class="img-fluid rounded" alt="{{ $activitiesItem->title }}">
                                </div>
                                <p class="card-text mt-2"><small class="text-muted">{{ $activitiesItem->created_at->format('M d, Y H:i') }}</small></p>
                            </div>
                        </div>
                    @endforeach

                    <div class="d-flex justify-content-center">
                        {{ $activities->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const readMoreLinks = document.querySelectorAll('.read-more');
    readMoreLinks.forEach(link => {
        link.addEventListener('click', function(e) {
            e.preventDefault();
            const newsId = this.getAttribute('data-news-id');
            const shortDesc = this.parentElement.querySelector('.short-description');
            const fullDesc = this.parentElement.querySelector('.full-description');

            if (shortDesc.style.display !== 'none') {
                shortDesc.style.display = 'none';
                fullDesc.style.display = 'inline';
                this.textContent = 'عرض أقل';
            } else {
                shortDesc.style.display = 'inline';
                fullDesc.style.display = 'none';
                this.textContent = 'قراءة المزيد';
            }
        });
    });
});
</script>
@endsection
