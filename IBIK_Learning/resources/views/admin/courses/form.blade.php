<form 
    action="{{ isset($course) ? route('admin.courses.update', $course->id) : route('admin.courses.store') }}" 
    method="POST" 
    enctype="multipart/form-data"
>
    @csrf
    @if(isset($course))
        @method('PUT')
    @endif

    <div class="row">
        <div class="col-md-6">
            <label class="form-label">Title</label>
            <input
                type="text"
                name="title"
                class="form-control"
                value="{{ old('title', $course->title ?? '') }}"
                required>
        </div>

        <div class="col-md-6">
            <label class="form-label">Category</label>
            <input
                type="text"
                name="category"
                class="form-control"
                value="{{ old('category', $course->category ?? '') }}"
                required>
        </div>

        <div class="col-md-6">
            <label class="form-label">Lessons</label>
            <input
                type="number"
                name="lessons"
                class="form-control"
                value="{{ old('lessons', $course->lessons ?? '') }}"
                required>
        </div>

        <div class="col-md-6">
            <label class="form-label">Students</label>
            <input
                type="number"
                name="students"
                class="form-control"
                value="{{ old('students', $course->students ?? '') }}"
                required>
        </div>

        <div class="col-md-6">
            <label class="form-label">Instructor</label>
            <input
                type="text"
                name="instructor"
                class="form-control"
                value="{{ old('instructor', $course->instructor ?? '') }}"
                required>
        </div>

        <div class="col-md-6">
            <label class="form-label">Role</label>
            <input
                type="text"
                name="role"
                class="form-control"
                value="{{ old('role', $course->role ?? '') }}"
                required>
        </div>

        <div class="col-md-6">
            <label class="form-label">Rating</label>
            <input
                type="number"
                name="rating"
                class="form-control"
                min="1"
                max="5"
                value="{{ old('rating', $course->rating ?? 1) }}"
                required>
        </div>

        <div class="col-md-6">
            <label class="form-label">Image</label>
            <input
                type="file"
                name="image"
                class="form-control"
                accept="image/*">
            <div class="mt-2">
                <img
                    id="image-preview"
                    src="{{ isset($course) && $course->image ? asset('storage/' . $course->image) : '' }}"
                    class="img-thumbnail d-block"
                    style="width:150px;height:auto;"
                    alt="Image Preview">
            </div>
        </div>

        <div class="col-md-6">
            <label class="form-label">Avatar</label>
            <input
                type="file"
                name="avatar"
                class="form-control"
                accept="image/*">
            <div class="mt-2">
                <img
                    id="avatar-preview"
                    src="{{ isset($course) && $course->avatar ? asset('storage/' . $course->avatar) : '' }}"
                    class="img-thumbnail d-block"
                    style="width:80px;height:80px;"
                    alt="Avatar Preview">
            </div>
        </div>
    </div>

    <div class="mt-4">
        <button
            type="submit"
            class="btn btn-{{ isset($course) ? 'warning' : 'primary' }}">
            {{ isset($course) ? 'Update' : 'Create' }}
        </button>
        <a
            href="{{ route('admin.courses.index') }}"
            class="btn btn-secondary">
            Cancel
        </a>
    </div>
</form>

@push('scripts')
<script>
    document.addEventListener("DOMContentLoaded", () => {
        const preview = (inputSelector, imgSelector) => {
            const input = document.querySelector(inputSelector);
            const img = document.querySelector(imgSelector);

            if (!input || !img) return;

            input.addEventListener('change', e => {
                const file = e.target.files[0];
                if (!file || !window.FileReader) return;

                const reader = new FileReader();
                reader.onload = ev => {
                    img.src = ev.target.result;
                };
                reader.readAsDataURL(file);
            });
        };
        preview('input[name="image"]', '#image-preview');
        preview('input[name="avatar"]', '#avatar-preview');
    });
</script>
@endpush
