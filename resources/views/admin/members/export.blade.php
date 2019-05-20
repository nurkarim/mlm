<table >
                      
                            <tr style="background-color: #f1f1f1">
                                <td>SL</td>
                                <td>Name</td>
                                <td>Username</td>
                                <td>Email</td>
                                <td>Total Referrals</td>
                                <td>Funds</td>
                            </tr>
                          @php $i=1; @endphp
                                @foreach($data as $value)
   <tr>
                                <td>{{ $i++ }}</td>
                                <td>{{ $value->name }}</td>
                                <td>{{ $value->email }}</td>
                                <td>{{ $value->user_name }}</td>
                                <td>{{ count($value->refferralCount) }}</td>
                                <td>{{ $value->funds_amount }}</td>
                            </tr>
                            @endforeach