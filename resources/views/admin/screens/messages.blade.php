<div class="bg-white rounded-2xl border border-gray-200 overflow-hidden shadow-sm">
    <div class="p-6 border-b border-gray-100 flex justify-between items-center">
        <h2 class="text-lg font-bold text-mubs-navy">Contact Messages</h2>
        <span class="bg-blue-100 text-blue-800 text-xs font-bold px-2.5 py-0.5 rounded-full">
            {{ $messages->count() }} Total
        </span>
    </div>

    <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="bg-gray-50/50">
                    <th class="px-6 py-4 text-xs font-bold text-mubs-navy uppercase tracking-wider">Date</th>
                    <th class="px-6 py-4 text-xs font-bold text-mubs-navy uppercase tracking-wider">Name / Reg No</th>
                    <th class="px-6 py-4 text-xs font-bold text-mubs-navy uppercase tracking-wider">Department</th>
                    <th class="px-6 py-4 text-xs font-bold text-mubs-navy uppercase tracking-wider">Subject</th>
                    <th class="px-6 py-4 text-xs font-bold text-mubs-navy uppercase tracking-wider">Message</th>
                    <th class="px-6 py-4 text-xs font-bold text-mubs-navy uppercase tracking-wider text-center">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @forelse ($messages as $msg)
                    <tr class="hover:bg-gray-50/50 transition-colors">
                        <td class="px-6 py-4 text-sm text-gray-500 whitespace-nowrap">
                            {{ $msg->created_at->format('M d, Y') }}
                        </td>
                        <td class="px-6 py-4">
                            <div class="text-sm font-bold text-mubs-navy">{{ $msg->full_name }}</div>
                            <div class="text-xs text-gray-400 mt-0.5">{{ $msg->reg_no }} • {{ $msg->email }}</div>
                        </td>
                        <td class="px-6 py-4">
                            <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-medium bg-blue-50 text-blue-700">
                                {{ $msg->department }}
                            </span>
                        </td>
                        <td class="px-6 py-4 text-sm font-semibold text-gray-700">
                            {{ $msg->subject }}
                        </td>
                        <td class="px-6 py-4 text-sm text-gray-500 max-w-xs truncate" title="{{ $msg->message }}">
                            {{ $msg->message }}
                        </td>
                        <td class="px-6 py-4 text-center">
                            <!-- Trash icon -->
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="px-6 py-10 text-center text-gray-400 text-sm">
                            No contact messages found.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>