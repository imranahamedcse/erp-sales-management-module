@extends('sales::layouts.master')

@section('content')
    <div class="container mx-auto px-4 py-6">
        <div class="card bg-base-100 shadow">
            <div class="card-body">
                <h1 class="text-2xl font-bold mb-6">All Notes</h1>

                <div class="overflow-x-auto">
                    <table class="table table-zebra">
                        <thead>
                            <tr>
                                <th>Content</th>
                                <th>Related To</th>
                                <th>Type</th>
                                <th>Created At</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($notes as $note)
                                <tr>
                                    <td>{{ Str::limit($note->content, 50) }}</td>
                                    <td>
                                        @if ($note->notable)
                                            @if ($note->notable_type === 'Modules\Sales\Models\Sale')
                                                Sale #{{ $note->notable->invoice_number ?? 'N/A' }}
                                            @elseif($note->notable_type === 'Modules\Sales\Models\Product')
                                                {{ $note->notable->name ?? 'N/A' }}
                                            @endif
                                        @else
                                            [Deleted Item]
                                        @endif
                                    </td>
                                    <td>
                                        <span
                                            class="badge {{ $note->notable_type === 'Modules\Sales\Models\Sale' ? 'badge-primary' : 'badge-secondary' }}">
                                            {{ class_basename($note->notable_type) }}
                                        </span>
                                    </td>
                                    <td>{{ $note->created_at->format('Y-m-d H:i') }}</td>
                                    <td>
                                        <div class="flex gap-1">
                                            <!-- In your table where you have the view button -->
                                            <button class="btn btn-xs btn-info view-note" data-content="{{ $note->content }}">
                                                <i class="fas fa-eye"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                @if ($notes->hasPages())
                    <div class="flex justify-between items-center mt-4">
                        <div>
                            <span class="text-sm">
                                Showing {{ $notes->firstItem() }} to {{ $notes->lastItem() }} of {{ $notes->total() }}
                                entries
                            </span>
                        </div>
                        <div class="join">
                            {{ $notes->links() }}
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>

    <!-- Note View Modal -->
    <div id="note-modal" class="modal">
        <div class="modal-box">
            <h3 class="font-bold text-lg">Note Details</h3>
            <div class="py-4">
                <p id="note-content" class="whitespace-pre-line"></p>
            </div>
            <div class="modal-action">
                <button class="btn" id="close-modal">Close</button>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script>
        $(document).ready(function() {
            // Open modal
            $(document).on('click', '.view-note', function() {
                const noteContent = $(this).data('content');
                $('#note-content').text(noteContent);
                $('#note-modal').addClass('modal-open');
            });

            // Close modal
            $('#close-modal').click(function() {
                $('#note-modal').removeClass('modal-open');
            });

            // Close when clicking outside
            $(document).on('click', function(e) {
                if ($(e.target).hasClass('modal') && $('#note-modal').hasClass('modal-open')) {
                    $('#note-modal').removeClass('modal-open');
                }
            });
        });
    </script>
@endpush
