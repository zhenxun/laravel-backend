<div class="table-responsive">
<table class="table table-sm table-borderless table-striped">
    <tbody>
      <tr>
        <th>{{ trans('form.members.ename.label') }}</th>
        <td>{{ $member->ename }}</td>
        <th>{{ trans('form.members.cname.label') }}</th>
        <td>{{ $member->cname }}</td>
        <td rowspan="2" width="120">
            {!! QrCode::size(120)->generate($member->member_code); !!}
        </td>
      </tr>
      <tr>
        <th>{{ trans('form.members.email.label') }}</th>
        <td>{{ $member->email }}</td>
        <th>{{ trans('form.members.gender.label.default') }}</th>
        <td>
          @switch($member->gender)
            @case('male')
              {{ trans('form.members.gender.label.male') }}
              @break
            @case('female')
              {{ trans('form.members.gender.label.female') }}
              @break
            @case('other')
              {{ trans('form.members.gender.label.default') }}
              @break
          @endswitch
        </td>
      </tr>
      <tr>
        <th>{{ trans('form.members.age_group.label.default') }}</th>
        <td>{{ $member->age_group }}</td>
        <th>{{ trans('form.members.contact_number.label') }}</th>
        <td colspan="2">{{ $member->contact_no }}</td>
      </tr>
      <tr>
          <th>{{ trans('form.members.joining_date.label') }}</th>
          <td>{{ $member->joining_date }}</td>
          <th width="150">{{ trans('form.members.sms_email.label') }}</th>
          <td colspan="2">
              @if($member->sms_email)
                <i class="fa fa-check"></i>
              @else
                <i class="fa fa-times"></i>
              @endif
          </td>
      </tr>
      <tr>
          <th width="150">{{ trans('form.members.consent.label') }}</th>
          <td>
              @if($member->consent)
                <i class="fa fa-check"></i>
              @else
                <i class="fa fa-times"></i>
              @endif
          </td>
          <th>{{ trans('form.members.remarks.label') }}</th>
          <td colspan="2" width="350">
            {{ $member->remarks }}
          </td>
      </tr>
    </tbody>
  </table>
</div>