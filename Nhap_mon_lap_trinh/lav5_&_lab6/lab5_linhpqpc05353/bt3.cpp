/*
	Pham Quang Linh
	MSSV: PC05353
*/
#include <stdio.h>

void hoanVi(int *a, int *b) {
  int temp = *a;
  *a = *b;
  *b = temp;
}

int main() {
  int a, b;
  printf("Moi nhap a: ");
  scanf("%d", &a);
  printf("Moi nhap b: ");
  scanf("%d", &b);
  
  printf("a truoc khi hoan vi la: %d\n", a);
  printf("b truoc khi hoan vi la: %d\n", b);
  
  hoanVi(&a, &b);
  
  printf("a sau khi hoan vi la: %d\n", a);
  printf("b sau khi hoan vi la: %d\n", b);
  return 0;
}

