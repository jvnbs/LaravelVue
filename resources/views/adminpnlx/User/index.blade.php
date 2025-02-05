@extends('adminpnlx.layouts.default')
@section('content')
<div class="page-inner">

    <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
        <div>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="{{route('Dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ $sectionName }}</li>
                </ol>
            </nav>
        </div>

        <div class="ms-md-auto py-1 py-md-0">
            <a href="javascript:void(0);" onclick="printMyPage()" class="btn btn-label-warning btn-round me-2">Print</a>
            <a href="{{route($modelName.'.QrCode') }}" class="btn btn-label-info btn-round me-2">QR Code</a>
            <a href="{{route($modelName.'.pdf') }}" class="btn btn-label-success btn-round me-2">PDF</a>
            <a href="{{route($modelName.'.htmlPdf') }}" class="btn btn-label-info btn-round me-2">Html PDF</a>
            <a href="{{route($modelName.'.export') }}" class="btn btn-label-danger btn-round me-2">Export</a>
            <a href="{{route($modelName.'.import') }}" class="btn btn-label-info btn-round me-2">Import</a>
            <a href="{{route($modelName.'.create') }}" class="btn btn-primary btn-round">Add {{ $sectionName }}</a>
        </div>
    </div>

    <div class="row p-2">
        <div class="col-2">
            <input type="text" class="form-control" value="Text copy" id="copyText" readonly>
        </div>
        <div class="col-1">
            <a href="javascript:void(0);" class="btn btn-sm btn-label-danger btn-round"
                onclick="copyToClipboard()">Copy</a>
        </div>
        <div class="col-2">
            <input type="text" class="form-control" value="Text paste" id="pasteText" readonly>
        </div>
        <div class="col-2">
            <a href="javascript:void(0);" class="btn btn-sm btn-label-danger btn-round"
                onclick="pasteToClipboard()">Paste</a>
        </div>
    </div>


    <div class="row">
        <div class="col-md-12">
            <div class="card card-round">
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <!-- Projects table -->
                        <table class="table align-items-center mb-0">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col" class="text-center">Name</th>
                                    <th scope="col" class="text-center">Email</th>
                                    <th scope="col" class="text-center">Phone Number</th>
                                    <th scope="col" class="text-center">Gender</th>
                                    <th scope="col" class="text-center">Added On</th>
                                    <th scope="col" class="text-center">Status</th>
                                    <th scope="col" class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if($results->isNotEmpty())
                                @foreach($results as $result)
                                <tr>
                                    <td class="text-center">{{ $result->name ?? '' }}</td>
                                    <td class="text-center">{{ $result->email ?? '' }}</td>
                                    <td class="text-center">{{ $result->phone_number ?? '' }}</td>
                                    <td class="text-center">{{ $result->gender ?? '' }}</td>
                                    <td class="text-center">{{ $result->created_at ?? '' }}</td>
                                    <td class="text-center">
                                        @if($result->is_active == 1)
                                        <span class="badge badge-success">Activated</span>
                                        @else
                                        <span class="badge badge-danger">Deactivated</span>
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        @if($result->is_active == 0)
                                        <a href="{{ route($modelName . '.changeStatus', [base64_encode($result->id), 0]) }}"
                                            class="btn btn-icon btn-round btn-success btn-sm" title="Activated">
                                            <i class="fa fa-check btn-sm"></i>
                                        </a>
                                        @else
                                        <a href="{{ route($modelName . '.changeStatus', [base64_encode($result->id), 1]) }}"
                                            class="btn btn-icon btn-round btn-danger btn-sm" title="Deactivated">
                                            <i class="fa fa-check btn-sm"></i>
                                            @endif

                                        </a>
                                        <a href="{{ route($modelName . '.show', base64_encode($result->id)) }}"
                                            class="btn btn-icon btn-round btn-primary btn-sm me-2" title="View">
                                            <i class="fa fa-eye btn-sm"></i>
                                        </a>

                                        <a href="{{ route($modelName . '.edit', base64_encode($result->id)) }}"
                                            class="btn btn-icon btn-round btn-warning btn-sm me-2" title="Edit">
                                            <i class="fa fa-info btn-sm"></i>
                                        </a>
                                        <a href="{{ route($modelName . '.delete', base64_encode($result->id)) }}"
                                            class="btn btn-icon btn-round btn-danger btn-sm" title="Remove">
                                            <i class="fa fa-trash btn-sm"></i>
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                                @else
                                <tr>
                                    <td class="text-center text-danger"> Record Not Found. </td>
                                </tr>
                                @endif
                            </tbody>
                        </table>
                        <div class="row">
                            <div class="col-12 text-end flex-end">
                                <div class="pagination">
                                    {{ $results->links('adminpnlx.pagination.default') }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Blade व्यू को एक डिव में रेंडर करें -->
<div id="printableArea" style="display:none;">
    {!! view('adminpnlx.User.print', ['results' => $results])->render() !!}
</div>

<script>
function printMyPage() {
    var printableContent = document.getElementById('printableArea').innerHTML;
    var originalContent = document.body.innerHTML;

    document.body.innerHTML = printableContent;

    window.print();

    document.body.innerHTML = originalContent;
}
</script>

<script>
function copyToClipboard() {
    var copyText = document.getElementById("copyText");
    copyText.select();
    copyText.setSelectionRange(0, 99999);
    document.execCommand("copy");
    alert("Copied the text: " + copyText.value);
}

function pasteToClipboard() {
    navigator.clipboard.readText()
        .then(text => {
            document.getElementById("pasteText").value = text;
            alert("Text pasted from clipboard!");
        })
        .catch(err => {
            console.error("Error reading clipboard: ", err);
        });
}

</script>

@endsection