# SlowMo Download for PHP
Throttle download speed of any (*.bin default) file type.

```
@author: Faisal Iqbal
@company: Orison Technologies <orison.biz>
@script: slowmo_download.php
@description: Throttle download speed of *.bin file types
@parameters: file = name of the file in same folder as script
@parameters: bw = throttle bandwith in bytes, default is 4096/sec
```

Usage example for 20KB/s:
```
slowmo_download.php?file=ota-firmware-v1.1.bin&bw=20480
```

Usage example for 8KB/s:
```
slowmo_download.php?file=ota-firmware-v1.1.bin&bw=8192
```
