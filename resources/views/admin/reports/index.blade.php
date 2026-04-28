@extends('layouts.app')

@section('title', 'التقارير - MyCare')

@section('content')
<div class="admin-reports">
    <div class="header">
        <h1>📋 تقارير النظام</h1>
        <p>عرض جميع التقارير الطبية التي أرسلها المستخدمون</p>
        <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary">← العودة للوحة التحكم</a>
    </div>

    @if($reports->isEmpty())
        <div class="card text-center">
            <p class="text-muted">لا توجد تقارير</p>
        </div>
    @else
        @foreach($reports as $report)
            <div class="card">
                <div class="report-info">
                    <h3>{{ $report->title }}</h3>
                    <p class="text-muted">
                        <strong>المستخدم:</strong> {{ $report->user->name ?? 'غير معروف' }}
                    </p>
                    <p class="text-muted">
                        <strong>النوع:</strong> {{ $report->getTypeLabel() ?? $report->type }}
                    </p>
                    <p class="text-muted">
                        <strong>الفترة:</strong> {{ $report->start_date->format('d/m/Y') }} - {{ $report->end_date->format('d/m/Y') }}
                    </p>
                    <p class="text-muted small">تاريخ الإنشاء: {{ $report->created_at->format('d/m/Y H:i') }}</p>
                </div>

                <div class="report-actions">
                    <a href="{{ route('reports.show', $report->id) }}" class="btn btn-primary btn-sm">عرض</a>
                    <a href="{{ route('reports.download', $report->id) }}" class="btn btn-secondary btn-sm">تحميل PDF</a>
                </div>
            </div>
        @endforeach

        <div class="pagination">
            {{ $reports->links() }}
        </div>
    @endif
</div>

<style>
.admin-reports .report-info {
    flex: 1;
}

.report-actions {
    display: flex;
    gap: 8px;
    align-items: center;
}

.btn-sm {
    padding: 6px 12px;
    font-size: 14px;
}

.admin-reports .card {
    display: flex;
    justify-content: space-between;
    align-items: flex-start;
}
</style>
@endsection
