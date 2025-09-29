#include <stdio.h>
int main()
{
  int n, gio, phut, giay;
  printf("Moi nhap so n (0 - 86399): ");
  scanf("%d", &n);
  gio = n / 3600;
  n %= 3600;
  phut = n / 60;
  n %= 60;
  giay = n;
  printf("%02d:%02d:%02d", gio, phut, giay);
  return 0;
}
