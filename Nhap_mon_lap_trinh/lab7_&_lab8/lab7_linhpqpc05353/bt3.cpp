/*
	Pham Quang Linh
	MSSV: PC05353
*/
#include <stdio.h>
#include <string.h>

int main()
{
  int i, j, k;
  char a[5][20];
  for (i = 0; i < 5; i++)
  {
    printf("Moi nhap chuoi thu %d: ", i + 1);
    gets(a[i]);
  }
  
  for (i = 0; i < 5; i++) {
    for (j = 0; j < strlen(a[i]); j++) {
      for (k = j + 1; k < strlen(a[i]); k++) {
        if (a[i][j] > a[i][k]) {
          char temp = a[i][j];
          a[i][j] = a[i][k];
          a[i][k] = temp;
        }
      }
    }
  }

  for (i = 0; i < 5; i++)
  {
    printf("%s\n", a[i]);
  }
  return 0;
}
