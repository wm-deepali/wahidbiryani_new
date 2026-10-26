{{-- Destination: resources/views/admin/partials/inbox-styles.blade.php --}}
{{-- Shared, self-contained styles for the enquiries + job applications admin pages.
     Variables and base classes mirror the blog / careers / FAQ admin pages.
     Existing class names are kept so the enquiries pages keep working. --}}
<style>
    :root {
        --bg:            #f1f2f4;
        --surface:       #ffffff;
        --border:        #e3e5e8;
        --text-primary:  #202223;
        --text-secondary:#6d7175;
        --text-hint:     #8c9196;
        --accent:        #303d89;
        --accent-light:  #f0f1fc;
        --green:         #007a5e;
        --green-bg:      #e3f1ec;
        --red:           #b22222;
        --red-bg:        #fce8e8;
        --radius-sm:     8px;
        --radius-md:     12px;
        --shadow-card:   0 1px 3px rgba(0,0,0,.08), 0 0 0 1px var(--border);
        --font:          'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
    }

    .edit-page, .list-page { background: var(--bg); padding: 24px 28px; min-height: 100vh; font-family: var(--font); color: var(--text-primary); }
    .edit-page *, .list-page * { box-sizing: border-box; }
    @media(max-width:768px) { .edit-page, .list-page { padding: 16px; } }

    /* ── Page header ── */
    .edit-page-header, .list-page-header { display: flex; align-items: flex-start; justify-content: space-between; flex-wrap: wrap; gap: 12px; margin-bottom: 20px; }
    .edit-page-header h1, .list-page-header h1 { font-size: 20px; font-weight: 650; color: var(--text-primary); margin: 0; }
    .crumb { font-size: 12.5px; color: var(--text-hint); margin-top: 3px; }
    .crumb a { color: var(--accent); text-decoration: none; }
    .crumb a:hover { text-decoration: underline; }
    .crumb span { margin: 0 5px; }

    /* ── Alerts ── */
    .flash-success { background: var(--green-bg); border: 1px solid #b7dccf; color: var(--green); border-radius: var(--radius-sm); padding: 12px 16px; margin-bottom: 16px; font-size: 13px; }
    .form-errors { background: var(--red-bg); border: 1px solid #f2c4c4; color: var(--red); border-radius: var(--radius-sm); padding: 12px 16px; margin-bottom: 16px; font-size: 13px; }
    .form-errors ul { margin: 0; padding-left: 18px; }

    /* ── Buttons ── */
    .btn-primary-dash {
        display: inline-flex; align-items: center; gap: 6px;
        background: var(--accent); color: #fff !important; border: none;
        border-radius: var(--radius-sm); padding: 8px 18px;
        font-size: 13px; font-weight: 600; cursor: pointer;
        text-decoration: none !important; font-family: var(--font);
        transition: background .15s; box-shadow: 0 1px 3px rgba(48,61,137,.25);
        white-space: nowrap;
    }
    .btn-primary-dash:hover:not(:disabled) { background: #252f70; }
    .btn-primary-dash:disabled { opacity: .65; cursor: not-allowed; }

    .btn-secondary-dash {
        display: inline-flex; align-items: center; gap: 6px;
        background: var(--surface); color: var(--text-primary) !important;
        border: 1px solid var(--border); border-radius: var(--radius-sm);
        padding: 8px 18px; font-size: 13px; font-weight: 500;
        text-decoration: none !important; font-family: var(--font);
        transition: background .15s; cursor: pointer; white-space: nowrap;
    }
    .btn-secondary-dash:hover { background: var(--bg); }

    .btn-danger-dash {
        display: inline-flex; align-items: center; gap: 6px;
        background: var(--surface); color: var(--red) !important;
        border: 1px solid #f2c4c4; border-radius: var(--radius-sm);
        padding: 8px 16px; font-size: 13px; font-weight: 600; cursor: pointer;
        font-family: var(--font); transition: background .15s;
    }
    .btn-danger-dash:hover { background: var(--red-bg); }

    .link-btn { background: none; border: 0; padding: 0; cursor: pointer; font-family: var(--font); font-size: 13px; font-weight: 600; color: var(--accent); text-decoration: none; }
    .link-btn:hover { text-decoration: underline; }
    .link-btn.danger { color: var(--red); }

    /* ── Section card ── */
    .section-card { background: var(--surface); border: 1px solid var(--border); border-radius: var(--radius-md); box-shadow: var(--shadow-card); overflow: hidden; margin-bottom: 16px; }
    .section-card:last-child { margin-bottom: 0; }
    .section-card-header { padding: 14px 20px; border-bottom: 1px solid var(--border); background: #fafafa; }
    .section-card-header h5 { font-size: 13px; font-weight: 650; color: var(--text-primary); margin: 0; letter-spacing: .01em; }
    .section-card-body { padding: 20px; }

    /* ── Form fields ── */
    .field-group { margin-bottom: 16px; }
    .field-group:last-child { margin-bottom: 0; }
    .field-label { display: block; font-size: 12px; font-weight: 600; color: var(--text-secondary); letter-spacing: .03em; text-transform: uppercase; margin-bottom: 6px; }
    .field-input, .field-select {
        width: 100%; height: 38px; border: 1px solid var(--border);
        border-radius: var(--radius-sm); padding: 0 12px;
        font-size: 13.5px; color: var(--text-primary);
        background: var(--surface); outline: none;
        transition: border-color .15s, box-shadow .15s;
        font-family: var(--font);
    }
    .field-input:focus, .field-select:focus { border-color: var(--accent); box-shadow: 0 0 0 3px rgba(48,61,137,.12); }

    /* ── Status tabs (rounded pills with count) ── */
    .inbox-tabs, .filter-tabs { display: flex; flex-wrap: wrap; gap: 8px; margin-bottom: 16px; }
    .inbox-tab, .filter-tab {
        display: inline-flex; align-items: center; gap: 6px;
        padding: 6px 14px; border: 1px solid var(--border); border-radius: 20px;
        font-size: 12.5px; font-weight: 600; background: var(--surface);
        color: var(--text-secondary) !important; text-decoration: none !important; transition: all .12s;
    }
    .inbox-tab:hover, .filter-tab:hover { background: var(--bg); color: var(--text-primary) !important; }
    .inbox-tab.active, .filter-tab.active { background: var(--accent-light); border-color: rgba(48,61,137,.3); color: var(--accent) !important; }
    .inbox-tab b, .filter-tab b { font-size: 11px; font-weight: 700; background: var(--bg); border-radius: 10px; padding: 1px 7px; color: var(--text-secondary); margin: 0; opacity: 1; }
    .inbox-tab.active b, .filter-tab.active b { background: #fff; color: var(--accent); }

    /* ── Legacy filters row (enquiries pages) ── */
    .inbox-filters { display: flex; flex-wrap: wrap; gap: 10px; margin-bottom: 16px; align-items: center; }
    .inbox-filters .field-input, .inbox-filters .field-select { width: auto; min-width: 190px; }

    /* ── Legacy table (enquiries pages) ── */
    .inbox-scroll { overflow-x: auto; }
    .inbox-table { width: 100%; border-collapse: collapse; font-size: 13.5px; }
    .inbox-table th { text-align: left; padding: 11px 16px; font-size: 11px; text-transform: uppercase; letter-spacing: .05em;
        color: var(--text-hint); background: #fafafa; border-bottom: 1px solid var(--border); white-space: nowrap; }
    .inbox-table td { padding: 13px 16px; border-bottom: 1px solid var(--border); vertical-align: top; color: var(--text-primary); }
    .inbox-table tr:last-child td { border-bottom: 0; }
    .inbox-table tr.is-new td:first-child { box-shadow: inset 3px 0 0 #f79009; }
    .inbox-sub { display: block; font-size: 12px; color: var(--text-hint); margin-top: 2px; }
    .inbox-snippet { max-width: 320px; color: var(--text-secondary); }
    .inbox-actions { display: flex; gap: 12px; white-space: nowrap; align-items: center; }
    .inbox-actions form { margin: 0; }
    .inbox-empty { padding: 44px 20px; text-align: center; color: var(--text-hint); font-size: 14px; }
    .inbox-pager { padding: 14px 16px; border-top: 1px solid var(--border); }

    /* ── Status badges (legacy) ── */
    .inbox-badge { display: inline-flex; align-items: center; gap: 5px; padding: 3px 10px; border-radius: 20px; font-size: 11.5px; font-weight: 600; text-transform: capitalize; }
    .inbox-badge::before { content: ''; width: 6px; height: 6px; border-radius: 50%; background: currentColor; flex-shrink: 0; }
    .st-new         { background: #fffaeb; color: #b54708; }
    .st-contacted,
    .st-shortlisted { background: #eff8ff; color: #175cd3; }
    .st-closed      { background: #f2f4f7; color: #475467; }
    .st-rejected    { background: var(--red-bg); color: var(--red); }
    .st-hired       { background: var(--green-bg); color: var(--green); }

    /* ── Dashboard-style list (same look as Blogs / Careers / FAQ) ── */
    .list-card { background: var(--surface); border: 1px solid var(--border); border-radius: var(--radius-md); box-shadow: var(--shadow-card); overflow: hidden; }
    .list-toolbar { display: flex; flex-wrap: wrap; gap: 10px; align-items: center; padding: 14px 16px; border-bottom: 1px solid var(--border); background: #fafafa; }
    .list-toolbar .field-input, .list-toolbar .field-select { width: auto; min-width: 200px; background: var(--surface); }
    .list-toolbar .field-input { flex: 1 1 240px; }

    .data-table { width: 100%; border-collapse: collapse; }
    .data-table thead tr { background: #fafafa; border-bottom: 1px solid var(--border); }
    .data-table thead th { padding: 10px 16px; font-size: 11px; font-weight: 650; text-transform: uppercase; letter-spacing: .05em; color: var(--text-secondary); white-space: nowrap; text-align: left; }
    .data-table tbody tr { border-bottom: 1px solid var(--border); transition: background .12s; }
    .data-table tbody tr:last-child { border-bottom: none; }
    .data-table tbody tr:hover { background: #fafbfc; }
    .data-table tbody tr.is-new td:first-child { box-shadow: inset 3px 0 0 #f79009; }
    .data-table td { padding: 13px 16px; font-size: 13px; color: var(--text-primary); vertical-align: middle; }

    .id-chip { display: inline-block; background: var(--bg); border: 1px solid var(--border); border-radius: 6px; padding: 2px 8px; font-size: 11.5px; font-family: 'SF Mono','Fira Mono',monospace; color: var(--text-secondary); }
    .row-title { font-size: 13.5px; font-weight: 600; color: var(--text-primary); line-height: 1.4; }
    .row-sub { font-size: 12px; color: var(--text-hint); margin-top: 2px; }

    /* Pills */
    .pill { display: inline-flex; align-items: center; gap: 5px; padding: 3px 10px; border-radius: 20px; font-size: 11.5px; font-weight: 600; white-space: nowrap; text-transform: capitalize; }
    .pill::before { content: ''; width: 6px; height: 6px; border-radius: 50%; flex-shrink: 0; background: currentColor; }
    .pill-new         { background: #fffaeb; color: #b54708; }
    .pill-shortlisted { background: #eff8ff; color: #175cd3; }
    .pill-rejected    { background: var(--red-bg); color: var(--red); }
    .pill-hired       { background: var(--green-bg); color: var(--green); }
    .pill-contacted   { background: #eff8ff; color: #175cd3; }
    .pill-closed      { background: #f2f4f7; color: #475467; }
    .pill-type        { background: var(--accent-light); color: var(--accent); }

    /* Icon action buttons */
    .action-btn { display: inline-flex; align-items: center; justify-content: center; width: 30px; height: 30px; border-radius: var(--radius-sm); border: 1px solid var(--border); background: var(--surface); color: var(--text-secondary); cursor: pointer; text-decoration: none !important; transition: all .15s; font-size: 12px; }
    .action-btn:hover        { background: var(--bg); color: var(--text-primary); border-color: #c9cccf; }
    .action-btn.view:hover   { background: var(--accent-light); color: var(--accent); border-color: rgba(48,61,137,.25); }
    .action-btn.danger:hover { background: var(--red-bg); color: var(--red); border-color: #f5c0c0; }

    /* Empty state */
    .empty-state { text-align: center; padding: 56px 24px; }
    .empty-icon-wrap { width: 56px; height: 56px; border-radius: 50%; background: var(--accent-light); margin: 0 auto 16px; display: flex; align-items: center; justify-content: center; color: var(--accent); font-size: 22px; }
    .empty-state h6 { font-size: 14px; font-weight: 650; color: var(--text-primary); margin: 0 0 6px; }
    .empty-state p  { font-size: 13px; color: var(--text-hint); margin: 0; }

    /* Pagination */
    .pagination-bar { padding: 14px 20px; border-top: 1px solid var(--border); }
    .pagination-bar .pagination { margin: 0; }
    .pagination-bar .page-link  { border-color: var(--border); color: var(--accent); font-size: 13px; border-radius: var(--radius-sm) !important; margin: 0 2px; }
    .pagination-bar .page-item.active .page-link { background: var(--accent); border-color: var(--accent); color: #fff; }
    .pagination-bar .page-item.disabled .page-link { color: var(--text-hint); }

    /* Identity chip (detail page header) */
    .identity-chip { display: flex; align-items: center; gap: 10px; background: var(--surface); border: 1px solid var(--border); border-radius: var(--radius-md); padding: 10px 16px; box-shadow: var(--shadow-card); max-width: 380px; }
    .identity-avatar { width: 36px; height: 36px; border-radius: var(--radius-sm); background: var(--accent-light); display: flex; align-items: center; justify-content: center; font-size: 13px; font-weight: 700; color: var(--accent); flex-shrink: 0; text-transform: uppercase; }
    .identity-name { font-size: 13px; font-weight: 600; color: var(--text-primary); max-width: 260px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis; }
    .identity-sub { font-size: 12px; color: var(--text-hint); }

    /* ── Detail pages ── */
    .edit-layout { display: grid; grid-template-columns: 1fr 300px; gap: 20px; align-items: start; }
    @media(max-width:900px) { .edit-layout { grid-template-columns: 1fr; } }
    .inbox-kv { display: grid; grid-template-columns: 140px 1fr; gap: 12px 14px; font-size: 13.5px; margin: 0; }
    .inbox-kv dt { color: var(--text-hint); font-weight: 600; }
    .inbox-kv dd { margin: 0; color: var(--text-primary); word-break: break-word; }
    .inbox-kv a { color: var(--accent); }
    .inbox-message { white-space: pre-wrap; line-height: 1.7; font-size: 14px; color: var(--text-primary); }
    .inbox-btnrow { display: flex; flex-wrap: wrap; gap: 10px; }
</style>