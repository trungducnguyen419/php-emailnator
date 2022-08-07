# PHP EmailNator
Mã nguồn để làm api get mail, otp từ server.
# Cách sử dụng:
### 1. Tạo email (GET/POST)
```
http://localhost/?type=create-mail&domain=false&plusgmail=false&dotgmail=true
```
Params
```
type: create-mail (*)
domain: mail domain (boolean)
dotgmail: . gmail (boolean)
dotgmail: + gmail (boolean)
```

Response OK:
```JSON
{
  "statusCode": 200,
  "token": "eyJjb29raWVzIjoiWFNSRi1UT0tFTj1leUpwZGlJNklrNVVhbmd4WnpkTFMwOVFVbk5pWldacUx6YzBXbWM5UFNJc0luWmhiSFZsSWpvaVV6VjRVV0V4U0hwd1ZHNUJSSFpJZDFWelVucFJNbE52VW1KUGQwOU9kSEZsU1VGS00wNXNVbTFLVjB0aU9FeERkbUZaWkZObU1HRkZWSEo0VkV4emRqbFRXVXAxTjJ0TlNuVlBPR2xKV2t4WVZGUjZiMEUwUTJsWVRtRkRTa281YTJGSVZsUndRbm95TUhCS1pWWk1ibU5EVTFoRE5ra3ZNMEZuVUZsRVlpOGlMQ0p0WVdNaU9pSmpPREJrWkRKaFpUWTVOakUxTTJGaFl6WXhOR0prT1RFeU4yUXpNR1pqTUdJd01qYzJZVEUwTVdKaU1EQTJaVFF5Tm1JNVltUTBNbU5qWVdKaU9EVTFJaXdpZEdGbklqb2lJbjAlM0Q7Z21haWxuYXRvcl9zZXNzaW9uPWV5SnBkaUk2SW1keGFFRXhOaTl5VGxKVlp6ZFZhQzkzVTA1cEwxRTlQU0lzSW5aaGJIVmxJam9pVTNkb09UVnlXbEI2VEhOdVRGUktiamRWVEdock1rVlpWMmhXVGtnMUwzRnNSMU5uZURselEzUkZVRFJMTTNoRlVHcEROa3Q2UWpKR1ZVZFZUbEUzWm1GaFMwSm5jbWR5T1VRd1ZrNUtMM295ZUZOcFZ6UkVZelZqTUd4MWJsSktWamt4VDFFclRFUlFWMVowWW5nNFRrMXRTVXBKUTFCMlowOXViakZ6Um5ZaUxDSnRZV01pT2lJMFl6RTVZakprWm1NME1tVmlNVEZoWWprME56STJNRFkxWmprM1pUTXhOakl5WWpVellXRTRNVE0yWkdVNVlqWmlaREJqTVRabU9EUXhZVFkzTmpreklpd2lkR0ZuSWpvaUluMCUzRDsiLCJ0b2tlbiI6ImV5SnBkaUk2SWs1VWFuZ3haemRMUzA5UVVuTmlaV1pxTHpjMFdtYzlQU0lzSW5aaGJIVmxJam9pVXpWNFVXRXhTSHB3Vkc1QlJIWklkMVZ6VW5wUk1sTnZVbUpQZDA5T2RIRmxTVUZLTTA1c1VtMUtWMHRpT0V4RGRtRlpaRk5tTUdGRlZISjRWRXh6ZGpsVFdVcDFOMnROU25WUE9HbEpXa3hZVkZSNmIwRTBRMmxZVG1GRFNrbzVhMkZJVmxSd1Fub3lNSEJLWlZaTWJtTkRVMWhETmtrdk0wRm5VRmxFWWk4aUxDSnRZV01pT2lKak9EQmtaREpoWlRZNU5qRTFNMkZoWXpZeE5HSmtPVEV5TjJRek1HWmpNR0l3TWpjMllURTBNV0ppTURBMlpUUXlObUk1WW1RME1tTmpZV0ppT0RVMUlpd2lkR0ZuSWpvaUluMD0ifQ==",
  "email": "a.r.unaz.e.lesta.r.e@gmail.com",
  "message": "OK"
}
```

Response ERROR:
```JSON
{
  "statusCode": 400,
  "message": "message error"
}
```

```JSON
{
  "statusCode": 500,
  "message": "message error"
}
```

### 2. Khôi phục email (GET/POST)
```
http://localhost/?type=recovery-mail&email=a.r.unaz.e.lesta.r.e@gmail.com
```
Params
```
type: recovery-mail (*)
email: email cần khôi phục (*)
```

Response OK:
```JSON
{
  "statusCode": 200,
  "token": "eyJjb29raWVzIjoiWFNSRi1UT0tFTj1leUpwZGlJNklqaElkVE0zWWs1SVowNVdlSFl3TDIwMGIwNVdPRkU5UFNJc0luWmhiSFZsSWpvaWJFUlphSEZrUzNFMFFYQjRaekZOTXpObGFUaDFVRTVYYW14Tkx5OXRSM1ZhYzNkMGFFRlBhRU5VVlZoQ09VVnJZMU0xTTFKSFRGQkVWMk0wVDNOVWVVNUVVa0V2VjNkMFVFaGthMHRGVlVsUk5XRnlNMGh0ZFVJdlp6RTVSemg2ZWsweGRuUXpjblZ2TjNBelFsUnlNUzh6SzBwa1FreERXbVpaYW1aWFR6TWlMQ0p0WVdNaU9pSTJaV0ZrTW1VM016QmhOR0k0WXpOallqUTNNR05oWm1VNVl6Y3hZemcxTWprMk5EUTJObVk0WlRsbVlqQXdabVUyTTJSa05ETTFNamcxTm1KbU5XRmhJaXdpZEdGbklqb2lJbjAlM0Q7Z21haWxuYXRvcl9zZXNzaW9uPWV5SnBkaUk2SWtKbmMwRlhNeXRSVnlzMk5EZElMMjlDU2toT1NtYzlQU0lzSW5aaGJIVmxJam9pWm1SSVJtUnpVRFpVTlZwTE5qSldlSGxzT1haelZYZFZWMmgzWmxCVk1UUkhLMUI2TXpkaWEwaFFSRXRJVEhSWE1HSjNRbEJqUXk5YVJDOHhjMUl5YVRoWGJFdFZiRkptUzI4MU1tdGxjbUZ6UjFCQ1kzaEpkalY0VkhkdWJIQkdkVU5zT0ROc2VIUjNUR2RYUjIxQ1VsTlNUVzVUUkdkNVZHdG9ka05aYXk4aUxDSnRZV01pT2lKaFpUUm1NbU15WkRRNVlXSXhNRE5qT0dJeE1UTm1aR0ZtTURBNE1qSmlaVGhpTWpneFlqRXdPVGsxWkdFMk5HUXdaakJsTXpWbVpXVmtNemsyTkRrNElpd2lkR0ZuSWpvaUluMCUzRDsiLCJ0b2tlbiI6ImV5SnBkaUk2SWpoSWRUTTNZazVJWjA1V2VIWXdMMjAwYjA1V09GRTlQU0lzSW5aaGJIVmxJam9pYkVSWmFIRmtTM0UwUVhCNFp6Rk5Nek5sYVRoMVVFNVhhbXhOTHk5dFIzVmFjM2QwYUVGUGFFTlVWVmhDT1VWclkxTTFNMUpIVEZCRVYyTTBUM05VZVU1RVVrRXZWM2QwVUVoa2EwdEZWVWxSTldGeU0waHRkVUl2WnpFNVJ6aDZlazB4ZG5RemNuVnZOM0F6UWxSeU1TOHpLMHBrUWt4RFdtWlphbVpYVHpNaUxDSnRZV01pT2lJMlpXRmtNbVUzTXpCaE5HSTRZek5qWWpRM01HTmhabVU1WXpjeFl6ZzFNamsyTkRRMk5tWTRaVGxtWWpBd1ptVTJNMlJrTkRNMU1qZzFObUptTldGaElpd2lkR0ZuSWpvaUluMD0ifQ==",
  "email": "a.r.unaz.e.lesta.r.e@gmail.com",
  "message": "OK"
}
```

Response ERROR:
```JSON
{
  "statusCode": 400,
  "message": "message error"
}
```

```JSON
{
  "statusCode": 500,
  "message": "message error"
}
```

### 3. Lấy danh sách list mail inbox (GET/POST)
```
http://localhost/?type=get-list-mail&email=a.r.unaz.e.lesta.r.e@gmail.com&token=eyJjb29raWVzIjoiWFNSRi1UT0tFTj1leUpwZGlJNklrNVVhbmd4WnpkTFMwOVFVbk5pWldacUx6YzBXbWM5UFNJc0luWmhiSFZsSWpvaVV6VjRVV0V4U0hwd1ZHNUJSSFpJZDFWelVucFJNbE52VW1KUGQwOU9kSEZsU1VGS00wNXNVbTFLVjB0aU9FeERkbUZaWkZObU1HRkZWSEo0VkV4emRqbFRXVXAxTjJ0TlNuVlBPR2xKV2t4WVZGUjZiMEUwUTJsWVRtRkRTa281YTJGSVZsUndRbm95TUhCS1pWWk1ibU5EVTFoRE5ra3ZNMEZuVUZsRVlpOGlMQ0p0WVdNaU9pSmpPREJrWkRKaFpUWTVOakUxTTJGaFl6WXhOR0prT1RFeU4yUXpNR1pqTUdJd01qYzJZVEUwTVdKaU1EQTJaVFF5Tm1JNVltUTBNbU5qWVdKaU9EVTFJaXdpZEdGbklqb2lJbjAlM0Q7Z21haWxuYXRvcl9zZXNzaW9uPWV5SnBkaUk2SW1keGFFRXhOaTl5VGxKVlp6ZFZhQzkzVTA1cEwxRTlQU0lzSW5aaGJIVmxJam9pVTNkb09UVnlXbEI2VEhOdVRGUktiamRWVEdock1rVlpWMmhXVGtnMUwzRnNSMU5uZURselEzUkZVRFJMTTNoRlVHcEROa3Q2UWpKR1ZVZFZUbEUzWm1GaFMwSm5jbWR5T1VRd1ZrNUtMM295ZUZOcFZ6UkVZelZqTUd4MWJsSktWamt4VDFFclRFUlFWMVowWW5nNFRrMXRTVXBKUTFCMlowOXViakZ6Um5ZaUxDSnRZV01pT2lJMFl6RTVZakprWm1NME1tVmlNVEZoWWprME56STJNRFkxWmprM1pUTXhOakl5WWpVellXRTRNVE0yWkdVNVlqWmlaREJqTVRabU9EUXhZVFkzTmpreklpd2lkR0ZuSWpvaUluMCUzRDsiLCJ0b2tlbiI6ImV5SnBkaUk2SWs1VWFuZ3haemRMUzA5UVVuTmlaV1pxTHpjMFdtYzlQU0lzSW5aaGJIVmxJam9pVXpWNFVXRXhTSHB3Vkc1QlJIWklkMVZ6VW5wUk1sTnZVbUpQZDA5T2RIRmxTVUZLTTA1c1VtMUtWMHRpT0V4RGRtRlpaRk5tTUdGRlZISjRWRXh6ZGpsVFdVcDFOMnROU25WUE9HbEpXa3hZVkZSNmIwRTBRMmxZVG1GRFNrbzVhMkZJVmxSd1Fub3lNSEJLWlZaTWJtTkRVMWhETmtrdk0wRm5VRmxFWWk4aUxDSnRZV01pT2lKak9EQmtaREpoWlRZNU5qRTFNMkZoWXpZeE5HSmtPVEV5TjJRek1HWmpNR0l3TWpjMllURTBNV0ppTURBMlpUUXlObUk1WW1RME1tTmpZV0ppT0RVMUlpd2lkR0ZuSWpvaUluMD0ifQ%3D%3D
```
Params
```
type: get-list-mail (*)
email: email (*)
token: token (*)
```

Response OK:
```JSON
{
  "statusCode": 200,
  "list_mail": [
    {
      "messageID": "ADSVPN",
      "from": "NordVPN",
      "subject": "Your ISP is tracking you! Hide your address with a VPN",
      "time": "Just Now"
    },
    {
      "messageID": "MTgyNzdiNGFkZDhmOTgzNA==",
      "from": "\"Trung Đức Nguyễn\" <trungd419@gmail.com>",
      "subject": "Subject",
      "time": "Just Now"
    }
  ],
  "message": "OK"
}
```

Response ERROR:
```JSON
{
  "statusCode": 400,
  "message": "message error"
}
```

```JSON
{
  "statusCode": 500,
  "message": "message error"
}
```

### 4. Đọc mail từ message id (GET/POST)
```
http://localhost/emailnator/?type=read-mail&message_id=MTgyNzdiNGFkZDhmOTgzNA%3D%3D&email=a.r.unaz.e.lesta.r.e@gmail.com&token=eyJjb29raWVzIjoiWFNSRi1UT0tFTj1leUpwZGlJNklrNVVhbmd4WnpkTFMwOVFVbk5pWldacUx6YzBXbWM5UFNJc0luWmhiSFZsSWpvaVV6VjRVV0V4U0hwd1ZHNUJSSFpJZDFWelVucFJNbE52VW1KUGQwOU9kSEZsU1VGS00wNXNVbTFLVjB0aU9FeERkbUZaWkZObU1HRkZWSEo0VkV4emRqbFRXVXAxTjJ0TlNuVlBPR2xKV2t4WVZGUjZiMEUwUTJsWVRtRkRTa281YTJGSVZsUndRbm95TUhCS1pWWk1ibU5EVTFoRE5ra3ZNMEZuVUZsRVlpOGlMQ0p0WVdNaU9pSmpPREJrWkRKaFpUWTVOakUxTTJGaFl6WXhOR0prT1RFeU4yUXpNR1pqTUdJd01qYzJZVEUwTVdKaU1EQTJaVFF5Tm1JNVltUTBNbU5qWVdKaU9EVTFJaXdpZEdGbklqb2lJbjAlM0Q7Z21haWxuYXRvcl9zZXNzaW9uPWV5SnBkaUk2SW1keGFFRXhOaTl5VGxKVlp6ZFZhQzkzVTA1cEwxRTlQU0lzSW5aaGJIVmxJam9pVTNkb09UVnlXbEI2VEhOdVRGUktiamRWVEdock1rVlpWMmhXVGtnMUwzRnNSMU5uZURselEzUkZVRFJMTTNoRlVHcEROa3Q2UWpKR1ZVZFZUbEUzWm1GaFMwSm5jbWR5T1VRd1ZrNUtMM295ZUZOcFZ6UkVZelZqTUd4MWJsSktWamt4VDFFclRFUlFWMVowWW5nNFRrMXRTVXBKUTFCMlowOXViakZ6Um5ZaUxDSnRZV01pT2lJMFl6RTVZakprWm1NME1tVmlNVEZoWWprME56STJNRFkxWmprM1pUTXhOakl5WWpVellXRTRNVE0yWkdVNVlqWmlaREJqTVRabU9EUXhZVFkzTmpreklpd2lkR0ZuSWpvaUluMCUzRDsiLCJ0b2tlbiI6ImV5SnBkaUk2SWs1VWFuZ3haemRMUzA5UVVuTmlaV1pxTHpjMFdtYzlQU0lzSW5aaGJIVmxJam9pVXpWNFVXRXhTSHB3Vkc1QlJIWklkMVZ6VW5wUk1sTnZVbUpQZDA5T2RIRmxTVUZLTTA1c1VtMUtWMHRpT0V4RGRtRlpaRk5tTUdGRlZISjRWRXh6ZGpsVFdVcDFOMnROU25WUE9HbEpXa3hZVkZSNmIwRTBRMmxZVG1GRFNrbzVhMkZJVmxSd1Fub3lNSEJLWlZaTWJtTkRVMWhETmtrdk0wRm5VRmxFWWk4aUxDSnRZV01pT2lKak9EQmtaREpoWlRZNU5qRTFNMkZoWXpZeE5HSmtPVEV5TjJRek1HWmpNR0l3TWpjMllURTBNV0ppTURBMlpUUXlObUk1WW1RME1tTmpZV0ppT0RVMUlpd2lkR0ZuSWpvaUluMD0ifQ%3D%3D
```
Params
```
type: read-mail (*)
email: email của token (*)
token: token (*)
message_id: message id (*)
```

Response OK:
```JSON
{
  "statusCode": 200,
  "body": "<div id=\"subject-header\"><b>From: </b>&quot;Trung Đức Nguyễn&quot; &lt;trungd419@gmail.com&gt;<br/><b>Subject: </b>Tiêu đề</b><div><b>Time: </b>2 minutes ago<hr /></div></div><div dir=\"ltr\">Nội dung</div>\n",
  "message": "OK"
}
```

Response ERROR:
```JSON
{
  "statusCode": 400,
  "message": "message error"
}
```

```JSON
{
  "statusCode": 500,
  "message": "message error"
}
```
