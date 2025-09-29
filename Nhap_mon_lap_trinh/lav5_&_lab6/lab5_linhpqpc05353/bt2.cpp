/*
	Pham Quang Linh
	MSSV: PC05353
*/
#include <stdio.h>

void tinhNamNhuan(int nam) {
  if ((nam % 400 == 0 || nam % 4 == 0) && nam % 100 != 0) printf("%d la nam nhuan\n", nam);
  else printf("%d khong phai nam nhuan\n", nam);
}

int main() {
  int nam, namNhuan;
  printf("Moi nhap nam: ");
  scanf("%d", &nam);
  tinhNamNhuan(nam);
  return 0;
}

