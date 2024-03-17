<div class="card">
{{--    <div class="card-header bg-white">Search Criteria</div>--}}
    <div class="card-body">
        <div class="row">
            <div class="col-12 ">
                <form method="get" action="{{ route('school.examination.class.analysis') }}" class="">
                    @csrf
                    <div class="row">
                        <div class="col-lg-6 col-md-6">
                            <label for="class_id"><strong>Exam Name</strong></label>
                            <select name="exam_id" class="form-select" id="exam_id" aria-label="Category">
                                <option value="">select</option>
                                @foreach($exams as $exam)
                                    <option value="{{ $exam->id }}">{{ $exam->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <label for="class_id"><strong>Class</strong></label>
                            <select name="class_id" class="form-select" id="class_id" onchange="classSections()" aria-label="Category">
                                <option value="">select</option>
                                @foreach($classes as $class)
                                    <option value="{{ $class->id }}">{{ $class->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 mt-1">
                            <button type="submit" class="btn btn-outline-info float-end"><i class="fa fa-search"></i> Filter</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>





