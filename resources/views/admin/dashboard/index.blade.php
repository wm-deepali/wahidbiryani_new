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

  .kpi-badge.warn {
    background: var(--amber-bg);
    color: var(--amber);
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

  .view-link {
    font-size: 12.5px;
    font-weight: 600;
    color: var(--accent);
    text-decoration: none;
  }

  .vdot {
    font-size: 11px;
    margin-left: 4px;
  }

  .vdot.yes {
    color: var(--green);
  }

  .vdot.no {
    color: var(--amber);
  }

  /* ── Status badges ──────────────────────────────────────────── */
  .status-pill {
    display: inline-flex;
    align-items: center;
    gap: 5px;
    font-size: 11.5px;
    font-weight: 600;
    padding: 3px 9px;
    border-radius: 20px;
    text-transform: capitalize;
  }

  .status-pill::before {
    content: '';
    width: 5px;
    height: 5px;
    border-radius: 50%;
    display: inline-block;
  }

  .status-pill.delivered {
    background: var(--green-bg);
    color: var(--green);
  }

  .status-pill.delivered::before {
    background: var(--green);
  }

  .status-pill.pending {
    background: var(--amber-bg);
    color: var(--amber);
  }

  .status-pill.pending::before {
    background: var(--amber);
  }

  .status-pill.processing {
    background: var(--blue-bg);
    color: var(--blue);
  }

  .status-pill.processing::before {
    background: var(--blue);
  }

  /* ── Ranked lists ───────────────────────────────────────────── */
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
    width: 22px;
    height: 22px;
    border-radius: 50%;
    background: var(--bg);
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 11px;
    font-weight: 700;
    color: var(--text-secondary);
    flex-shrink: 0;
    margin-right: 10px;
  }

  .product-rank-item .name {
    flex: 1;
    font-weight: 500;
    color: var(--text-primary);
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

@php
    $statusPill = ['new' => 'pending', 'contacted' => 'processing', 'closed' => 'delivered'];
    $statusColor = ['new' => '#916a00', 'contacted' => '#0069d9', 'closed' => '#007a5e'];
    $maxSource = max(1, collect($stats)->max('total'));
@endphp

<div class="main-section">
  @include('admin.header')

  <div class="container-fluid">
    <div class="content-area">

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

      <!-- KPI row 1: leads -->
      <div class="kpi-grid">

        <div class="kpi-card">
          <div class="kpi-icon purple"><i class="fa fa-inbox"></i></div>
          <div class="kpi-label">Total Leads</div>
          <div class="kpi-value">{{ number_format($leads['total']) }}</div>
          <span class="kpi-badge {{ $leads['change'] >= 0 ? 'up' : 'down' }}">
            <i class="fa fa-arrow-{{ $leads['change'] >= 0 ? 'up' : 'down' }}"></i>
            {{ abs($leads['change']) }}%
          </span>
          <span class="kpi-sub">{{ $leads['week'] }} in last 7 days</span>
        </div>

        <div class="kpi-card">
          <div class="kpi-icon amber"><i class="fa fa-bell"></i></div>
          <div class="kpi-label">New / Unattended</div>
          <div class="kpi-value">{{ number_format($statusCounts['new']) }}</div>
          <span class="kpi-badge {{ $statusCounts['new'] > 0 ? 'warn' : 'up' }}">
            {{ $statusCounts['new'] > 0 ? 'Needs follow-up' : 'All caught up' }}
          </span>
        </div>

        <div class="kpi-card">
          <div class="kpi-icon blue"><i class="fa fa-calendar-day"></i></div>
          <div class="kpi-label">Received Today</div>
          <div class="kpi-value">{{ number_format($leads['today']) }}</div>
          <span class="kpi-badge info">Enquiries + applications</span>
        </div>

        <div class="kpi-card">
          <div class="kpi-icon green"><i class="fa fa-circle-check"></i></div>
          <div class="kpi-label">Mobile Verified</div>
          <div class="kpi-value">{{ $verifiedRate }}%</div>
          <span class="kpi-badge up">{{ $verifiedCount }} of {{ $verifiedTotal }}</span>
          <span class="kpi-sub">contact + package</span>
        </div>

      </div>

      <!-- KPI row 2: content -->
      <div class="kpi-grid">

        <div class="kpi-card">
          <div class="kpi-icon amber"><i class="fa fa-briefcase"></i></div>
          <div class="kpi-label">Job Applications</div>
          <div class="kpi-value">{{ number_format($stats['applications']['total']) }}</div>
          <span class="kpi-badge info">{{ $stats['applications']['week'] }} this week</span>
        </div>

        <div class="kpi-card">
          <div class="kpi-icon purple"><i class="fa fa-user-tie"></i></div>
          <div class="kpi-label">Open Positions</div>
          <div class="kpi-value">{{ number_format($content['careers']) }}</div>
          <span class="kpi-badge info">Active careers</span>
        </div>

        <div class="kpi-card">
          <div class="kpi-icon blue"><i class="fa fa-newspaper"></i></div>
          <div class="kpi-label">Published Blogs</div>
          <div class="kpi-value">{{ number_format($content['blogs']) }}</div>
          <span class="kpi-badge info">Live on site</span>
        </div>

        <div class="kpi-card">
          <div class="kpi-icon green"><i class="fa fa-circle-question"></i></div>
          <div class="kpi-label">Active FAQs</div>
          <div class="kpi-value">{{ number_format($content['faqs']) }}</div>
          <span class="kpi-badge info">{{ $content['pages'] }} dynamic pages</span>
        </div>

      </div>

      <!-- Main grid -->
      <div class="main-grid">

        <!-- LEFT -->
        <div class="stack">

          <div class="cardx">
            <div class="cardx-head">
              <h5>Last 14 Days</h5>
            </div>
            <div class="chart-wrap">
              <canvas id="trendChart"></canvas>
            </div>
          </div>

          <div class="cardx">
            <div class="cardx-head">
              <h5>Latest Activity</h5>
              <a href="{{ route('admin.enquiries.index') }}">All enquiries →</a>
            </div>

            @if ($recent->isEmpty())
              <p class="empty-note">Nothing has come in yet.</p>
            @else
              <div style="overflow-x:auto">
                <table class="dash-table">
                  <thead>
                    <tr>
                      <th>Type</th>
                      <th>Name</th>
                      <th>Status</th>
                      <th>Received</th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($recent as $item)
                      <tr>
                        <td><span class="type-tag">{{ $item['type'] }}</span></td>
                        <td>
                          {{ $item['name'] }}
                          @if ($item['verified'] === true)
                            <i class="fa fa-circle-check vdot yes" title="Mobile verified"></i>
                          @elseif ($item['verified'] === false)
                            <i class="fa fa-circle-exclamation vdot no" title="Mobile not verified"></i>
                          @endif
                          <span class="sub">{{ $item['detail'] }}</span>
                        </td>
                        <td>
                          @if ($item['status'])
                            <span class="status-pill {{ $statusPill[$item['status']] ?? 'pending' }}">{{ $item['status'] }}</span>
                          @else
                            —
                          @endif
                        </td>
                        <td style="white-space:nowrap">
                          {{ $item['at']->diffForHumans() }}
                          <span class="sub">{{ $item['at']->format('d M, h:i A') }}</span>
                        </td>
                        <td><a href="{{ $item['url'] }}" class="view-link">View</a></td>
                      </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            @endif
          </div>

        </div>

        <!-- RIGHT -->
        <div class="stack">

          <div class="cardx">
            <h5>Enquiry Status</h5>
            @foreach (['new' => 'New', 'contacted' => 'Contacted', 'closed' => 'Closed'] as $key => $label)
              @php $pct = $statusTotal > 0 ? round(($statusCounts[$key] / $statusTotal) * 100) : 0; @endphp
              <div class="progress-row">
                <div class="progress-label">
                  <span>{{ $label }}</span>
                  <span>{{ $statusCounts[$key] }} ({{ $pct }}%)</span>
                </div>
                <div class="progress">
                  <div class="progress-bar" style="width:{{ $pct }}%;background:{{ $statusColor[$key] }}"></div>
                </div>
              </div>
            @endforeach
          </div>

          <div class="cardx">
            <h5>Leads By Source</h5>
            @foreach ($sources as $key => $source)
              <div class="progress-row">
                <div class="progress-label">
                  <span>{{ $source['label'] }}</span>
                  <span>{{ number_format($stats[$key]['total']) }}</span>
                </div>
                <div class="progress">
                  <div class="progress-bar"
                    style="width:{{ round(($stats[$key]['total'] / $maxSource) * 100) }}%;background:{{ $source['color'] }}">
                  </div>
                </div>
              </div>
            @endforeach
          </div>

          <div class="cardx">
            <h5>Top Services Requested</h5>
            @forelse ($topServices as $i => $row)
              <div class="product-rank-item">
                <div class="rank">{{ $i + 1 }}</div>
                <div class="name">{{ $row->service }}</div>
                <div class="qty">{{ $row->total }}</div>
              </div>
            @empty
              <p class="empty-note">No contact enquiries yet.</p>
            @endforelse
          </div>

          <div class="cardx">
            <h5>Top Packages</h5>
            @forelse ($topPackages as $i => $row)
              <div class="product-rank-item">
                <div class="rank">{{ $i + 1 }}</div>
                <div class="name">{{ $row->label }}</div>
                <div class="qty">{{ $row->total }}</div>
              </div>
            @empty
              <p class="empty-note">No package enquiries yet.</p>
            @endforelse
          </div>

        </div>

      </div>

    </div><!-- /content-area -->
  </div><!-- /container-fluid -->
</div><!-- /main-section -->

@include('admin.footer')

<script>
  (function () {
    const chart = @json($chart);
    const el = document.getElementById('trendChart');
    if (!el || typeof Chart === 'undefined') return;

    new Chart(el, {
      type: 'line',
      data: {
        labels: chart.labels,
        datasets: chart.datasets.map(function (d) {
          return {
            label: d.label,
            data: d.data,
            borderColor: d.color,
            backgroundColor: d.color,
            borderWidth: 2,
            tension: 0.35,
            pointRadius: 2,
            pointHoverRadius: 4,
            fill: false
          };
        })
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        interaction: { mode: 'index', intersect: false },
        plugins: {
          legend: { position: 'bottom', labels: { usePointStyle: true, boxWidth: 8 } }
        },
        scales: {
          x: { grid: { display: false } },
          y: { beginAtZero: true, ticks: { precision: 0 } }
        }
      }
    });
  })();
</script>