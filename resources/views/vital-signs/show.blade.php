@extends('layouts.app')

@section('title', $vitalSign->getTypeLabel() . ' - MyCare')

@section('content')
<div class="vital-sign-details">
    <h2>❤️ {{ $vitalSign->getTypeLabel() }}</h2>

    <div class="card mt-2">
        <h3>معلومات القياس</h3>
        <p><strong>النوع:</strong> {{ $vitalSign->getTypeLabel() }}</p>
        <p><strong>القيمة الأولى:</strong> {{ $vitalSign->value_1 }} {{ $vitalSign->unit }}</p>
        @if($vitalSign->value_2)
            <p><strong>القيمة الثانية:</strong> {{ $vitalSign->value_2 }} {{ $vitalSign->unit }}</p>
        @endif
        <p><strong>تاريخ القياس:</strong> {{ $vitalSign->measured_at->format('d/m/Y H:i') }}</p>
        @if($vitalSign->notes)
            <p><strong>الملاحظات:</strong> {{ $vitalSign->notes }}</p>
        @endif
        <p style="color: {{ $vitalSign->is_abnormal ? 'var(--danger)' : 'var(--success)' }}; font-weight: bold; margin-top: 10px;">
            @if($vitalSign->is_abnormal)
                ⚠️ قيمة غير طبيعية
            @else
                ✅ قيمة طبيعية
            @endif
        </p>
    </div>

    <div class="mt-2">
        <a href="{{ route('vital-signs.index') }}" class="btn btn-secondary">العودة للقائمة</a>
        <a href="{{ route('vital-signs.create') }}" class="btn btn-primary">تسجيل قياس جديد</a>
    </div>
</div>
@endsection