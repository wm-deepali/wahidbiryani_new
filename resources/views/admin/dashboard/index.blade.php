{{-- Destination: resources/views/admin/dashboard/index.blade.php --}}
@include('admin.top-header')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<style>
  /* ── Design Tokens ──────────────────────────────────────────── */
  :root {
    --bg: #f1f2f4;
    --surface: #ffffff;
    --border: #e3e5e8;
    --text-primary: #202223;
    --text-secondary: #6d7175;
    --text-hint: #8c9196;
    --accent: #303d89;
    --accent-light: #f0f1fc;
    --green: #007a5e;
    --green-bg: #e3f1ec;
    --amber: #916a00;
    --amber-bg: #fff5cc;
    --blue: #0069d9;
    --blue-bg: #e8f2ff;
    --red: #b22222;
    --red-bg: #fce8e8;
    --radius-sm: 8px;
    --radius-md: 12px;
    --shadow-card: 0 1px 3px rgba(0, 0, 0, .08), 0 0 0 1px var(--border);
    --font: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
  }

  .content-area * {
    box-sizing: border-box;
  }

  .content-area {
    background: var(--bg);
    padding: 24px 28px;
    min-height: 100vh;
    font-family: var(--font);
    color: var(--text-primary);
  }

  /* ── Layout grids ───────────────────────────────────────────── */
  .kpi-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
    gap: 16px;
    margin-bottom: 16px;
  }

  .main-grid {
    display: grid;
    grid-template-columns: minmax(0, 2fr) minmax(0, 1fr);
    gap: 16px;
    margin-top: 16px;
  }

  .stack {
    display: flex;
    flex-direction: column;
    gap: 16px;
  }

  /* ── Page header ────────────────────────────────────────────── */
  .dash-page-header {
    display: flex;
    align-items: center;
    justify-content: space-between;
    margin-bottom: 20px;
  }

  .dash-page-header h1 {
    font-size: 20px;
    font-weight: 650;
    color: var(--text-primary) !important;
    margin: 0;
  }

  .dash-page-header .dash-meta {
    font-size: 13px;
    color: var(--text-secondary);
    margin-top: 2px;
  }

  .dash-date-badge {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    background: var(--surface);
    border: 1px solid var(--border);
    border-radius: var(--radius-sm);
    padding: 7px 13px;
    font-size: 13px;
    font-weight: 500;
    color: var(--text-primary);
    box-shadow: 0 1px 2px rgba(0, 0, 0, .05);
  }

  /* ── Surface card ───────────────────────────────────────────── */
  .cardx {
    background: var(--surface);
    border: 1px solid var(--border);
    border-radius: var(--radius-md);
    padding: 20px;
    box-shadow: var(--shadow-card);
    transition: box-shadow .18s;
  }

  .cardx:hover {
    box-shadow: 0 3px 10px rgba(0, 0, 0, .1), 0 0 0 1px var(--border);
  }

  .cardx h1,
  .cardx h2,
  .cardx h3,
  .cardx h4,
  .cardx h5,
  .cardx h6,
  .cardx p,
  .cardx td,
  .cardx th,
  .cardx li {
    color: var(--text-primary) !important;
  }

  .cardx h5 {
    font-size: 13px;
    font-weight: 600;
    letter-spacing: .02em;
    text-transform: uppercase;
    color: var(--text-secondary) !important;
    margin-bottom: 16px;
  }

  .cardx-head {
    display: flex;
    align-items: center;
    justify-content: space-between;
    margin-bottom: 16px;
  }

  .cardx-head h5 {
    margin: 0;
  }

  .cardx-head a {
    font-size: 12.5px;
    font-weight: 600;
    color: var(--accent);
    text-decoration: none;
  }

  /* ── KPI cards ──────────────────────────────────────────────── */
  .kpi-card {
    background: var(--surface);
    border: 1px solid var(--border);
    border-radius: var(--radius-md);
    padding: 20px 20px 18px;
    box-shadow: var(--shadow-card);
    position: relative;
    transition: box-shadow .18s;
  }

  .kpi-card:hover {
    box-shadow: 0 3px 10px rgba(0, 0, 0, .1), 0 0 0 1px var(--border);
  }

  .kpi-label {
    font-size: 13px;
    font-weight: 500;
    color: var(--text-secondary);
    margin-bottom: 6px;
  }

  .kpi-value {
    font-size: 28px;
    font-weight: 700;
    color: var(--text-primary) !important;
    line-height: 1.1;
    margin-bottom: 10px;
  }

  .kpi-badge {
    display: inline-flex;
    align-items: center;
    gap: 4px;
    font-size: 12px;
    font-weight: 600;
    padding: 3px 8px;
    border-radius: 20px;
  }

  .kpi-badge.up {
    background: var(--green-bg);
    color: var(--green);
  }

  .kpi-badge.down {
    background: var(--red-bg);
    color: var(--red);
  }

  .kpi-badge.info {
    background: var(--blue-bg);
    color: var(--blue);
  }

  .kpi-icon {
    position: absolute;
    top: 18px;
    right: 18px;
    width: 36px;
    height: 36px;
    border-radius: var(--radius-sm);
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 15px;
    opacity: .85;
  }

  .kpi-icon.purple {
    background: #ede9fe;
    color: #6d28d9;
  }

  .kpi-icon.green {
    background: var(--green-bg);
    color: var(--green);
  }

  .kpi-icon.blue {
    background: var(--blue-bg);
    color: var(--blue);
  }

  .kpi-icon.amber {
    background: var(--amber-bg);
    color: var(--amber);
  }

  .kpi-sub {
    font-size: 12px;
    color: var(--text-hint);
    margin-left: 4px;
  }

  /* ── Progress bars ──────────────────────────────────────────── */
  .progress {
    height: 6px;
    border-radius: 10px;
    background: var(--bg);
    overflow: hidden;
  }

  .progress-bar {
    height: 100%;
    border-radius: 10px;
  }

  .progress-row {
    margin-bottom: 14px;
  }

  .progress-row:last-child {
    margin-bottom: 0;
  }

  .progress-label {
    display: flex;
    justify-content: space-between;
    font-size: 12px;
    margin-bottom: 5px;
  }

  .progress-label span:first-child {
    color: var(--text-secondary);
    font-weight: 500;
  }

  .progress-label span:last-child {
    color: var(--text-primary);
    font-weight: 600;
  }

  /* ── Table ──────────────────────────────────────────────────── */
  .dash-table {
    width: 100%;
    border-collapse: collapse;
    font-size: 13px;
  }

  .dash-table thead th {
    font-size: 11px;
    font-weight: 600;
    letter-spacing: .06em;
    text-transform: uppercase;
    color: var(--text-hint) !important;
    padding: 0 12px 10px;
    border-bottom: 1px solid var(--border);
    text-align: left;
  }

  .dash-table tbody tr {
    border-bottom: 1px solid var(--bg);
    transition: background .12s;
  }

  .dash-table tbody tr:hover {
    background: var(--bg);
  }

  .dash-table tbody tr:last-child {
    border-bottom: none;
  }

  .dash-table tbody td {
    padding: 11px 12px;
    color: var(--text-primary) !important;
    vertical-align: middle;
  }

  .dash-table .sub {
    display: block;
    font-size: 12px;
    color: var(--text-hint) !important;
  }

  .type-tag {
    font-size: 11.5px;
    font-weight: 600;
    color: var(--accent);
    background: var(--accent-light);
    padding: 2px 8px;
    border-radius: 6px;
    white-space: nowrap;
  }

  .type-tag.feedback {
    color: var(--green);
    background: var(--green-bg);
  }

  .type-tag.franchise {
    color: var(--amber);
    background: var(--amber-bg);
  }

  .view-link {
    font-size: 12.5px;
    font-weight: 600;
    color: var(--accent);
    text-decoration: none;
  }

  /* ── Ranked / quick lists ───────────────────────────────────── */
  .product-rank-item {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 10px 0;
    border-bottom: 1px solid var(--bg);
    font-size: 13px;
  }

  .product-rank-item:last-child {
    border-bottom: none;
  }

  .product-rank-item .rank {
    width: 28px;
    height: 28px;
    border-radius: 8px;
    background: var(--accent-light);
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 12px;
    color: var(--accent);
    flex-shrink: 0;
    margin-right: 10px;
  }

  .product-rank-item .name {
    flex: 1;
    font-weight: 500;
    color: var(--text-primary);
    text-decoration: none;
  }

  .product-rank-item .qty {
    font-size: 13px;
    font-weight: 700;
    color: var(--text-primary);
    background: var(--bg);
    padding: 2px 8px;
    border-radius: 6px;
  }

  .empty-note {
    font-size: 13px;
    color: var(--text-hint);
    margin: 0;
  }

  .chart-wrap {
    position: relative;
    height: 280px;
  }

  @media (max-width: 1100px) {
    .main-grid {
      grid-template-columns: 1fr;
    }
  }

  @media (max-width: 768px) {
    .content-area {
      padding: 16px;
    }

    .kpi-value {
      font-size: 24px;
    }
  }
</style>


<div class="main-section">
  @include('admin.header')

  <div class="container-fluid">
    <div class="content-area">

      @php
        // Small helper for the "vs last month" badges
        $changeBadge = function ($change) {
            if ($change === null) {
                return '<span class="kpi-badge info">New this month</span>';
            }
            $up = $change >= 0;
            return '<span class="kpi-badge ' . ($up ? 'up' : 'down') . '"><i class="fa fa-arrow-' . ($up ? 'up' : 'down') . '"></i> '
                . abs($change) . '%</span><span class="kpi-sub">vs last month</span>';
        };
      @endphp

      <!-- Page header -->
      <div class="dash-page-header">
        <div>
          <h1>Overview</h1>
          <div class="dash-meta">Welcome back, {{ auth()->user()->name }}</div>
        </div>
        <div class="dash-date-badge">
          <i class="fa fa-calendar-alt" style="color:var(--text-hint)"></i>
          {{ now()->format('jS M, Y') }}
        </div>
      </div>

      <!-- KPI cards -->
      <div class="kpi-grid">
        <div class="kpi-card">
          <div class="kpi-icon purple"><i class="fa fa-inbox"></i></div>
          <div class="kpi-label">All Submissions</div>
          <div class="kpi-value">{{ number_format($totals['all']) }}</div>
          <span class="kpi-badge info">{{ $totals['month'] }} this month</span>
          {!! $changeBadge($totals['change']) !!}
        </div>

        <div class="kpi-card">
          <div class="kpi-icon blue"><i class="fa fa-envelope"></i></div>
          <div class="kpi-label">Contact Enquiries</div>
          <div class="kpi-value">{{ number_format($kpi['contact']['total']) }}</div>
          <span class="kpi-badge info">{{ $kpi['contact']['month'] }} this month</span>
          {!! $changeBadge($kpi['contact']['change']) !!}
        </div>

        <div class="kpi-card">
          <div class="kpi-icon green"><i class="fa fa-comment-dots"></i></div>
          <div class="kpi-label">Feedback &amp; Suggestions</div>
          <div class="kpi-value">{{ number_format($kpi['feedback']['total']) }}</div>
          <span class="kpi-badge info">{{ $kpi['feedback']['month'] }} this month</span>
          {!! $changeBadge($kpi['feedback']['change']) !!}
        </div>

        <div class="kpi-card">
          <div class="kpi-icon amber"><i class="fa fa-handshake"></i></div>
          <div class="kpi-label">Franchise Enquiries</div>
          <div class="kpi-value">{{ number_format($kpi['franchise']['total']) }}</div>
          <span class="kpi-badge info">{{ $kpi['franchise']['month'] }} this month</span>
          {!! $changeBadge($kpi['franchise']['change']) !!}
        </div>
      </div>

      <div class="main-grid">

        <!-- LEFT: chart + recent -->
        <div class="stack">

          <div class="cardx">
            <div class="cardx-head">
              <h5>Submissions — Last 30 Days</h5>
            </div>
            <div class="chart-wrap">
              <canvas id="submissionsChart"></canvas>
            </div>
          </div>

          <div class="cardx">
            <div class="cardx-head">
              <h5>Recent Submissions</h5>
            </div>

            @if($recent->isEmpty())
              <p class="empty-note">No submissions yet. They will appear here as visitors use the forms.</p>
            @else
              <div style="overflow-x:auto">
                <table class="dash-table">
                  <thead>
                    <tr>
                      <th>Type</th>
                      <th>Name</th>
                      <th>Details</th>
                      <th>Received</th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($recent as $row)
                      <tr>
                        <td><span class="type-tag {{ strtolower($row['type']) }}">{{ $row['type'] }}</span></td>
                        <td>
                          {{ $row['name'] }}
                          <span class="sub">{{ $row['phone'] }}</span>
                        </td>
                        <td>{{ $row['detail'] ?: '—' }}</td>
                        <td>
                          {{ $row['at']->format('d M, g:i A') }}
                          <span class="sub">{{ $row['at']->diffForHumans() }}</span>
                        </td>
                        <td><a href="{{ $row['url'] }}" class="view-link">View</a></td>
                      </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            @endif
          </div>

        </div>

        <!-- RIGHT: breakdowns + content -->
        <div class="stack">

          <div class="cardx">
            <div class="cardx-head">
              <h5>Franchise Budgets</h5>
              <a href="{{ route('admin.franchise-enquiries.index') }}">View all</a>
            </div>
            @forelse($budgets as $budget => $count)
              <div class="progress-row">
                <div class="progress-label">
                  <span>{{ $budget ?: 'Not specified' }}</span>
                  <span>{{ $count }}</span>
                </div>
                <div class="progress">
                  <div class="progress-bar" style="width: {{ round(($count / $budgetMax) * 100) }}%; background: var(--amber);"></div>
                </div>
              </div>
            @empty
              <p class="empty-note">No franchise enquiries yet.</p>
            @endforelse
          </div>

          <div class="cardx">
            <div class="cardx-head">
              <h5>Feedback by Outlet</h5>
              <a href="{{ route('admin.feedbacks.index') }}">View all</a>
            </div>
            @forelse($feedbackByOutlet as $outlet => $count)
              <div class="progress-row">
                <div class="progress-label">
                  <span>{{ $outlet ?: 'Not specified' }}</span>
                  <span>{{ $count }}</span>
                </div>
                <div class="progress">
                  <div class="progress-bar" style="width: {{ round(($count / $feedbackMax) * 100) }}%; background: var(--green);"></div>
                </div>
              </div>
            @empty
              <p class="empty-note">No feedback yet.</p>
            @endforelse
          </div>

          <div class="cardx">
            <div class="cardx-head">
              <h5>Website Content</h5>
            </div>
            @foreach($content as $item)
              <div class="product-rank-item">
                <span class="rank"><i class="fa {{ $item['icon'] }}"></i></span>
                <a href="{{ route($item['route']) }}" class="name">{{ $item['label'] }}</a>
                <span class="qty">{{ number_format($item['count']) }}</span>
              </div>
            @endforeach
          </div>

        </div>
      </div>

    </div><!-- /content-area -->
  </div><!-- /container-fluid -->
</div><!-- /main-section -->

@include('admin.footer')

<script>
  (function () {
    var el = document.getElementById('submissionsChart');
    if (!el || typeof Chart === 'undefined') return;

    var labels = @json($labels);
    var series = @json($chart);

    function dataset(label, data, color) {
      return {
        label: label,
        data: data,
        borderColor: color,
        backgroundColor: color + '22',
        borderWidth: 2,
        tension: 0.35,
        pointRadius: 0,
        pointHoverRadius: 4,
        fill: false
      };
    }

    new Chart(el, {
      type: 'line',
      data: {
        labels: labels,
        datasets: [
          dataset('Contact', series.contact, '#0069d9'),
          dataset('Feedback', series.feedback, '#007a5e'),
          dataset('Franchise', series.franchise, '#916a00')
        ]
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        interaction: { mode: 'index', intersect: false },
        plugins: { legend: { position: 'bottom', labels: { usePointStyle: true, boxWidth: 8 } } },
        scales: {
          x: { grid: { display: false }, ticks: { maxTicksLimit: 8 } },
          y: { beginAtZero: true, ticks: { precision: 0 } }
        }
      }
    });
  })();
</script>