// 'columnDefs': [
//     {
//         'targets': [3, 4, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38, 39],
//         'className': 'hide-column'
//     }
// ],
<td>{{ $object->customer_name}} </td>
<td>{{ $object->account_number }}</td>
<td>{{ $object->business_type}} </td>
<td style="text-transform: uppercase">{{ $object->region}} </td>
<td style="text-transform: uppercase">{{ $object->bhub}} </td>
<td>{{ $object->createdBy}} </td>
<td>{{ $object->created_at}} </td>

<td style="text-transform: uppercase; display:none"> {{ $object->service_center}} </td>
<td style="display:none"> {{ $object->address}} </td>
<td style="display:none"> {{ $object->house_no}} </td>
<td style="display:none"> {{ $object->street}} </td>
<td style="display:none"> {{ $object->landmark}} </td>
<td style="display:none"> {{ $object->community}} </td>
<td style="display:none"> {{ $object->town}} </td>
<td style="display:none"> {{ $object->business_type}} </td>
<td style="display:none"> {{ $object->tariff_class}} </td>
<td style="text-transform: uppercase; display:none"> {{ $object->metered}} </td>
<td style="display:none"> {{ $object->meter_number}} </td>
<td style="display:none"> {{ $object->meter_rating}} </td>
<td style="text-transform: uppercase;display:none"> {{ $object->meter_make}} </td>
<td style="text-transform: uppercase;display:none"> {{ $object->meter_type}} </td>
<td style="display:none"> {{ $object->building_description}} </td>
<td style="display:none"> {{ $object->feeder}} </td>
<td style="text-transform:uppercase; display:none"> {{ $object->transformer_capacity}} </td>
<td style="display:none"> {{ $object->proposed_tariff}} </td>
<td style="display:none"> {{ $object->supply_source}} </td>
<td style="text-transform: uppercase; display:none"> {{ $object->customer_type}} </td>
<td style="text-transform: uppercase; display:none"> {{ $object->customer_category }} </td>
<td style="display:none"> {{ $object->customer_active}} </td>

<td style="display:none"> {{ $object->ct_rating}} </td>
<td style="display:none"> {{ $object->installed_capacity}} </td>
<td style="display:none"> {{ $object->email_bill}} </td>
<td style="display:none"> {{ $object->comment}} </td>
<td style="display:none"> {{ $object->contact_title}} </td>
<td style="display:none"> {{ $object->contact_first_name}} </td>
<td style="display:none"> {{ $object->contact_name}} </td>
<td style="display:none"> {{ $object->contact_phone}} </td>
<td style="display:none"> {{ $object->contact_email}} </td>
<td style="display:none"> {{ $object->lng}} </td>
<td style="display:none"> {{ $object->lat}} </td>