{{--
    Shared AJAX submit for the public forms (contact, feedback, franchise).
    Usage: @include('partials.ajax-form-script', ['formId' => 'feedbackForm', 'successId' => 'feedbackSuccess'])

    On success the server returns { message, redirect }; the visitor is sent to the
    thank-you page. If no redirect URL comes back, the inline success block is shown instead.
--}}
<script>
(function () {
    var form = document.getElementById('{{ $formId }}');
    var success = document.getElementById('{{ $successId }}');
    if (!form || !success) return;

    var errBox = document.createElement('div');
    errBox.className = 'text-danger small mt-3 text-center';
    errBox.style.display = 'none';
    form.appendChild(errBox);

    // Capture phase + stopImmediatePropagation so the old static submit handler doesn't also run.
    form.addEventListener('submit', function (e) {
        e.preventDefault();
        e.stopImmediatePropagation();

        var btn = form.querySelector('button[type="submit"]');
        var label = btn.textContent;
        var redirecting = false;
        errBox.style.display = 'none';
        btn.disabled = true;
        btn.textContent = 'Sending...';

        fetch(form.action, {
            method: 'POST',
            headers: {
                'Accept': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: new FormData(form)
        })
        .then(function (res) {
            return res.json().then(function (data) { return { ok: res.ok, data: data }; });
        })
        .then(function (r) {
            if (!r.ok) {
                var msg = (r.data && r.data.errors)
                    ? Object.values(r.data.errors)[0][0]
                    : ((r.data && r.data.message) || 'Something went wrong. Please try again.');
                throw new Error(msg);
            }

            // Go to the thank-you page (button stays disabled to block double submits)
            if (r.data && r.data.redirect) {
                redirecting = true;
                window.location.href = r.data.redirect;
                return;
            }

            // Fallback: inline success message
            form.reset();
            form.style.display = 'none';
            success.classList.add('active', 'show');
            success.style.display = 'block';
        })
        .catch(function (err) {
            errBox.textContent = err.message;
            errBox.style.display = 'block';
        })
        .finally(function () {
            if (redirecting) return;
            btn.disabled = false;
            btn.textContent = label;
        });
    }, true);
})();
</script>