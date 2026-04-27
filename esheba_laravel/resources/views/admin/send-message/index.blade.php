@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <div class="row mb-3">
        <div class="col-md-12">
            <h2>Send SMS/Email to Clients</h2>
        </div>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="row">
        <!-- Send Email Card -->
        <div class="col-md-6">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0">Send Email</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.send-message.send-email') }}" method="POST">
                        @csrf
                        
                        <div class="mb-3">
                            <label class="form-label">Recipient Type</label>
                            <div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="recipient_type" id="email_single" value="single" checked onchange="toggleEmailClient()">
                                    <label class="form-check-label" for="email_single">Single Client</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="recipient_type" id="email_all" value="all" onchange="toggleEmailClient()">
                                    <label class="form-check-label" for="email_all">All Clients</label>
                                </div>
                            </div>
                        </div>

                        <div class="mb-3" id="email_client_select">
                            <label for="email_client_id" class="form-label">Select Client</label>
                            <select class="form-select" id="email_client_id" name="client_id">
                                <option value="">-- Choose a Client --</option>
                                @foreach($clients as $client)
                                    <option value="{{ $client->id }}">{{ $client->client_name }} ({{ $client->company_name }})</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="email_subject" class="form-label">Subject</label>
                            <input type="text" class="form-control" id="email_subject" name="subject" placeholder="Email Subject" required>
                        </div>

                        <div class="mb-3">
                            <label for="email_message" class="form-label">Message</label>
                            <textarea class="form-control" id="email_message" name="message" rows="5" placeholder="Enter your email message" required></textarea>
                        </div>

                        <button type="submit" class="btn btn-primary w-100">Send Email</button>
                    </form>
                </div>
            </div>
        </div>

        <!-- Send SMS Card -->
        <div class="col-md-6">
            <div class="card">
                <div class="card-header bg-secondary text-white">
                    <h5 class="mb-0">Send SMS</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.send-message.send-sms') }}" method="POST">
                        @csrf
                        
                        <div class="mb-3">
                            <label class="form-label">Recipient Type</label>
                            <div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="recipient_type" id="sms_single" value="single" checked onchange="toggleSmsClient()">
                                    <label class="form-check-label" for="sms_single">Single Client</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="recipient_type" id="sms_all" value="all" onchange="toggleSmsClient()">
                                    <label class="form-check-label" for="sms_all">All Clients</label>
                                </div>
                            </div>
                        </div>

                        <div class="mb-3" id="sms_client_select">
                            <label for="sms_client_id" class="form-label">Select Client</label>
                            <select class="form-select" id="sms_client_id" name="client_id">
                                <option value="">-- Choose a Client --</option>
                                @foreach($clients as $client)
                                    <option value="{{ $client->id }}">{{ $client->client_name }} ({{ $client->company_name }})</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="sms_message" class="form-label">Message (160 characters max)</label>
                            <textarea class="form-control" id="sms_message" name="message" rows="5" placeholder="Enter your SMS message (max 160 characters)" maxlength="160" required onkeyup="updateCharCount()"></textarea>
                            <small class="text-muted">Characters: <span id="char_count">0</span>/160</small>
                        </div>

                        <button type="submit" class="btn btn-secondary w-100">Send SMS</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function toggleEmailClient() {
        const emailClientSelect = document.getElementById('email_client_select');
        const emailSingle = document.getElementById('email_single');
        if (emailSingle.checked) {
            emailClientSelect.style.display = 'block';
            document.getElementById('email_client_id').required = true;
        } else {
            emailClientSelect.style.display = 'none';
            document.getElementById('email_client_id').required = false;
        }
    }

    function toggleSmsClient() {
        const smsClientSelect = document.getElementById('sms_client_select');
        const smsSingle = document.getElementById('sms_single');
        if (smsSingle.checked) {
            smsClientSelect.style.display = 'block';
            document.getElementById('sms_client_id').required = true;
        } else {
            smsClientSelect.style.display = 'none';
            document.getElementById('sms_client_id').required = false;
        }
    }

    function updateCharCount() {
        const smsMessage = document.getElementById('sms_message');
        document.getElementById('char_count').textContent = smsMessage.value.length;
    }

    // Initialize on page load
    document.addEventListener('DOMContentLoaded', function() {
        toggleEmailClient();
        toggleSmsClient();
    });
</script>
@endsection
