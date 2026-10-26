<script>
(function () {
    const services = @json(config('faq_pages.services'));

    const form        = document.getElementById('faqForm');
    const serviceSel  = document.getElementById('serviceSelect');
    const subSel      = document.getElementById('subServiceSelect');
    const industrySel = document.getElementById('industrySelect');
    const groupSvc    = document.getElementById('group-service');
    const groupInd    = document.getElementById('group-industry');
    const hintGeneral = document.getElementById('hint-general');

    // Rebuild the sub service options for the chosen service
    function fillSubs(selected) {
        const subs = (services[serviceSel.value] || {}).subs || {};
        subSel.innerHTML = '<option value="">Main service page (no sub service)</option>';
        Object.keys(subs).forEach(function (key) {
            const opt = document.createElement('option');
            opt.value = key;
            opt.textContent = subs[key];
            if (key === selected) opt.selected = true;
            subSel.appendChild(opt);
        });
    }

    // Show only the fields that belong to the chosen type.
    // Hidden fields are disabled so they are not submitted.
    function applyType() {
        const type = form.querySelector('input[name="type"]:checked').value;

        const isService  = type === 'service';
        const isIndustry = type === 'industry';

        groupSvc.style.display    = isService ? '' : 'none';
        groupInd.style.display    = isIndustry ? '' : 'none';
        hintGeneral.style.display = (!isService && !isIndustry) ? '' : 'none';

        serviceSel.disabled  = !isService;
        subSel.disabled      = !isService;
        industrySel.disabled = !isIndustry;
    }

    serviceSel.addEventListener('change', function () { fillSubs(''); });
    form.querySelectorAll('input[name="type"]').forEach(function (r) {
        r.addEventListener('change', applyType);
    });

    fillSubs(subSel.dataset.selected || '');
    applyType();

    form.addEventListener('submit', function () {
        const btn = document.getElementById('saveBtn');
        btn.disabled = true;
        btn.innerHTML = '<i class="fa fa-spinner fa-spin"></i> ' + (btn.dataset.loading || 'Saving...');
    });
})();
</script>