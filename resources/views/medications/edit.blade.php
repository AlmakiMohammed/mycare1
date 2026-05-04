@extends('layouts.app')

@section('title', 'تعديل الدواء - MyCare')

@section('content')
<div class="medication-edit">
    <h2>💊 تعديل الدواء: {{ $medication->name }}</h2>

    <form method="POST" action="{{ route('medications.update', $medication) }}" class="mt-2">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="name">اسم الدواء *</label>
            <input type="text" id="name" name="name" value="{{ old('name', $medication->name) }}" required>
        </div>

        <div class="form-group">
            <label for="dosage">الجرعة *</label>
            <input type="text" id="dosage" name="dosage" placeholder="مثال: 500 ملغ" value="{{ old('dosage', $medication->dosage) }}" required>
        </div>

        <div class="form-group">
            <label for="frequency">التكرار *</label>
            <select id="frequency" name="frequency" required>
                <option value="">اختر التكرار</option>
                <option value="once_daily" {{ old('frequency', $medication->frequency) === 'once_daily' ? 'selected' : '' }}>مرة واحدة يومياً</option>
                <option value="twice_daily" {{ old('frequency', $medication->frequency) === 'twice_daily' ? 'selected' : '' }}>مرتين يومياً</option>
                <option value="three_times_daily" {{ old('frequency', $medication->frequency) === 'three_times_daily' ? 'selected' : '' }}>ثلاث مرات يومياً</option>
                <option value="four_times_daily" {{ old('frequency', $medication->frequency) === 'four_times_daily' ? 'selected' : '' }}>أربع مرات يومياً</option>
                <option value="every_6_hours" {{ old('frequency', $medication->frequency) === 'every_6_hours' ? 'selected' : '' }}>كل 6 ساعات</option>
                <option value="every_8_hours" {{ old('frequency', $medication->frequency) === 'every_8_hours' ? 'selected' : '' }}>كل 8 ساعات</option>
                <option value="every_12_hours" {{ old('frequency', $medication->frequency) === 'every_12_hours' ? 'selected' : '' }}>كل 12 ساعة</option>
                <option value="as_needed" {{ old('frequency', $medication->frequency) === 'as_needed' ? 'selected' : '' }}>حسب الحاجة</option>
            </select>
        </div>

        <div class="form-group">
            <label for="start_date">تاريخ البداية *</label>
            <input type="date" id="start_date" name="start_date" value="{{ old('start_date', $medication->start_date->format('Y-m-d')) }}" required>
        </div>

        <div class="form-group">
            <label for="end_date">تاريخ النهاية (اختياري)</label>
            <input type="date" id="end_date" name="end_date" value="{{ old('end_date', $medication->end_date ? $medication->end_date->format('Y-m-d') : '') }}">
        </div>

        <div class="form-group">
            <label for="reason">سبب الدواء</label>
            <input type="text" id="reason" name="reason" placeholder="مثال: ارتفاع ضغط الدم" value="{{ old('reason', $medication->reason) }}">
        </div>

        <div class="form-group">
            <label for="instructions">تعليمات خاصة</label>
            <textarea id="instructions" name="instructions" rows="3" placeholder="مثال: تناول مع الطعام">{{ old('instructions', $medication->instructions) }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary btn-block">تحديث الدواء</button>
        <a href="{{ route('medications.show', $medication) }}" class="btn btn-secondary btn-block">إلغاء</a>
    </form>
</div>
@endsection