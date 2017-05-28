@if(Auth::user()->ifHaveUsers != '[]')
   @php
      $status1 = "complete";
      $status2 = "complete";
      $status3 = "complete";
      $status4 = "active";
   @endphp
@elseif(Auth::user()->getProject != '[]')
   @php
      $status1 = "complete";
      $status2 = "complete";
      $status3 = "active";
      $status4 = "disabled";
   @endphp
@elseif(Auth::user()->getCompany)
   @php
      $status1 = "complete";
      $status2 = "active";
      $status3 = "disabled";
      $status4 = "disabled";
  @endphp
@else
   @php
      $status1 = "active";
      $status2 = "disabled";
      $status3 = "disabled";
      $status4 = "disabled";
   @endphp
@endif

<div class="container-steps">
            <div class="row bs-wizard" style="border-bottom:0;">

                <div class="col-xs-3 bs-wizard-step {{ $status1 }}">
                  <div class="text-center bs-wizard-stepnum">Step 1</div>
                  <div class="progress"><div class="progress-bar"></div></div>
                  <a href="#" class="bs-wizard-dot"></a>
                  <div class="bs-wizard-info text-center">Create Company</div>
                </div>

                <div class="col-xs-3 bs-wizard-step {{ $status2 }}"><!-- complete -->
                  <div class="text-center bs-wizard-stepnum">Step 2</div>
                  <div class="progress"><div class="progress-bar"></div></div>
                  <a href="#" class="bs-wizard-dot"></a>
                  <div class="bs-wizard-info text-center">Create Project</div>
                </div>

                <div class="col-xs-3 bs-wizard-step {{ $status3 }}"><!-- complete -->
                  <div class="text-center bs-wizard-stepnum">Step 3</div>
                  <div class="progress"><div class="progress-bar"></div></div>
                  <a href="#" class="bs-wizard-dot"></a>
                  <div class="bs-wizard-info text-center">Create Users</div>
                </div>

                <div class="col-xs-3 bs-wizard-step {{ $status4 }}"><!-- active -->
                  <div class="text-center bs-wizard-stepnum">Step 4</div>
                  <div class="progress"><div class="progress-bar"></div></div>
                  <a href="#" class="bs-wizard-dot"></a>
                  <div class="bs-wizard-info text-center">Create Task</div>
                </div>
            </div>
	</div>
